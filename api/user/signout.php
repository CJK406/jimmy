<?php
session_start();
$_SESSION['login_flag']="0";
$_SESSION['admin_login_flag']="0";

$return['status']=200;
echo json_encode($return);
?>