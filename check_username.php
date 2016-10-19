<?php 
require_once('core.php');
session_start();

$user = $_GET['username'];
$check = check_username($user);
echo json_encode($check);
?>