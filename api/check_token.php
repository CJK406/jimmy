<?php
include __DIR__ . "/db.php";
$header = apache_request_headers();
if(!empty($header['Authorization'])){
	$token = explode("Bearer ",$header['Authorization'])[1];

	$token = explode("Bearer ",$header['Authorization'])[1];
	$sql="SELECT * FROM user WHERE tokens='$token'";
	$result = $conn->query($sql);
	if($result->num_rows != 0){
		$row = $result -> fetch_assoc();
		$userId = $row['id']; 
		$user_fullname = $row['fullname'];
		$check_token = true;
	}
	else 
		$check_token = false;
}
else{
	$check_token= false;
}
// print($header['Authorization']);

?>