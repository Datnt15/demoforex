<?php 
require_once('connect.php');

/**
 * create new user
 * @param  text [username]
 * @param  text [password]
 * @param  text [email]
 * @return 
 */
function create_user($user,$pw,$email){
	global $conn;
	$sql = "INSERT INTO `user_table` (username,password,email) VALUES ('".$user."',md5('".$pw."'),'".$email."')";
	mysqli_query($conn,$sql);
}

/**
 * check username and password to login
 * @param  text [username]
 * @param  text [password]
 * @return 
 */
function login($user,$pw){
	global $conn;	
	$sql = "SELECT * FROM `user_table` WHERE username = '".$user."' and password = md5('".$pw."')";
	$query = mysqli_query($conn,$sql);
	$data = mysqli_fetch_assoc($query);			
	$total = mysqli_num_rows($query);
	if ($total > 0){		
		$_SESSION['uid'] = $data['uid'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		return true;
	}
	return false;
}

/**
 * check username resgister existed or not
 * @param  text [username]
 * @return 	0: not existed
 			1: existed
 */
function check_username($username){
	global $conn;
	$sql = "SELECT * FROM `user_table` WHERE username = '".$username."'";
	$query = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($query);
	if ($count > 0){
		return 1;
	}
	return 0;
}

/**
 * check email resgister existed or not
 * @param  text [email]
 * @return 	0: not existed
 			1: existed
 */
function check_email($email){
	global $conn;
	$sql = "SELECT * FROM `user_table` WHERE email = '".$email."'";
	$query = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($query);
	if ($count > 0){
		return 1;
	}
	return 0;
}

/**
 * get profile user to edit
 * @param  int [id user]
 * @return array [user info...]
 */
function get_profile_edit($uid){
	global $conn;
	$sql = "SELECT * FROM `user_table` WHERE uid = '".$uid."'";
	$query = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($query);
	return($data);
}

/**
 * update user info
 * @param  int [id user]
 * @param  string [fullname]
 * @param  string [passport ID]
 * @param  string [birthday]
 * @param  string [address]
 * @param  string [zipcode]
 * @param  string [phone]
 * @return true: if update successful
 *         false: if not
 */
function update_user($uid,$fullname,$passportID,$birthday,$address,$zipcode,$phone){
	global $conn;
	$sql = "UPDATE `user_table` SET fullname = '$fullname', passportID = '$passportID', birthday = '$birthday', address = '$address', zipcode = '$zipcode', phone = '$phone' WHERE uid = '".$uid."'";
	return mysqli_query($conn, $sql);
}

?>