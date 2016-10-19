<?php
$conn = mysqli_connect('localhost','forex_user','forex_user123!@#','dh_forex');	
if ($conn->connect_error) {
    die('Connect Error (' . $db->connect_errno . ') '
        . $mysqli->connect_error);
}

define('base_url', 'http://nguyendangdungha.com/demoforex/');

?>