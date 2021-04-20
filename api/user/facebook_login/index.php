<?php
session_start();
include __DIR__ . "/../../../db.php";
$email 		= $_POST['email'];
$fullname   = $_POST['fullname'];
$sql="SELECT * FROM user WHERE email='$email' AND fb_flag='1'";
$result = $conn->query($sql);
if($result->num_rows != 0)
{
	$row = $result -> fetch_assoc();
	$return['status']=200;
	$return['token']=$row['token'];
	$return['user_name']=$row['fullname'];
	$return['user_id']=$row['id'];
	$return['email']=$row['email'];

	$_SESSION['login_flag']="1";
	$_SESSION['token']=$row['token'];
	$_SESSION['user_name']=$row['fullname'];
	$_SESSION['user_id']=$row['id'];
	$_SESSION['email']=$row['email'];
}	 
else{
	$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
	$payload = json_encode(['fullname' => $fullname,'email'=>$email]);
	$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
	$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
	$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);
	$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
	$token = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

 	$query_insert = "INSERT INTO user (fullname,email,token,fb_flag) VALUES ('$fullname', '$email','$token','1')";
	$result1 = $conn->query($query_insert);
	$id = $conn->insert_id;
	$return['status']=200;
	$return['token']=$token;
	$return['user_name']=$fullname;
	$return['user_id']=$id;
	$return['email']=$email;
	$_SESSION['login_flag']="1";
	$_SESSION['token']=$token;
	$_SESSION['user_name']=$fullname;
	$_SESSION['user_id']=$id;
	$_SESSION['email']=$email;

}
echo json_encode($return);
?>