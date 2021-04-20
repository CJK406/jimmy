<?php
include __DIR__ . "/../../../db.php";
$email 		= $_POST['email'];
$password   = $_POST['password'];
$code = $_POST['verify_code'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql="SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows != 0)
{
	$row = $result -> fetch_assoc();
	 
	if($code == $row['verifycode'])
	{
		$return['status']=200;
		$return['message']="Successfully updated password";
		$query_update = "UPDATE user SET password='$password_hash',verifycode='',codeVerified='0' WHERE email='$email'";
		$result1 = $conn->query($query_update);
	}
	else{
		$return['status']=401;
		$return['message']='Verify code is not correct';
	}
	
}	 
else{
	$return['status']=400;
	$return['message']='Can not find that email';
}
echo json_encode($return);
?>