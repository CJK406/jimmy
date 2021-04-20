<?php
include __DIR__ . "/../../../db.php";
$email 		= $_POST['email'];
$code 		= $_POST['verify_code'];

$sql="SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);
if($result->num_rows != 0)
{
	$row = $result -> fetch_assoc();
	 
	if($code == $row['verifycode'])
	{
		$return['status']=200;
		$return['message']="Verified code successed";
		$query_update = "UPDATE user SET codeVerified='1' WHERE email='$email'";
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