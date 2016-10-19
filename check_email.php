<?php 
require_once('core.php');
session_start();

$email = $_GET['email'];
$check = check_email($email);
echo json_encode($check);
?>