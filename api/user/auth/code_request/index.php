<?php
include __DIR__ . "/../../../db.php";
$email = $_POST['email'];


$verify_code = rand(100000,1000000);
$sql="SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows != 0)
{
	$row = $result -> fetch_assoc();
	$query_update = "UPDATE user SET verifycode='$verify_code' WHERE email='$email'";
	$result1 = $conn->query($query_update);
	$return['status']=200;
	$return['message']="Successfully sent verify code to ".$email;

	$subject = "Forget Password";

	$message = "
	<html>
	<head>
	<title>HTML email</title>
	</head>
	<body>
	<p>Hello ".$row['fullname']."</p>
	<p>
		You recently requested to reset your password. Here is your verify code.
	</p>
	<p style='font-size:25px'>
		".$verify_code."
	</p>
	<p>Thanks</p>
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: <circlemedia@support.com>' . "\r\n";
	mail($email,$subject,$message,$headers);
}	 
else{
	$return['status']=400;
	$return['message']='Can not find that email';
}





echo json_encode($return);




?>