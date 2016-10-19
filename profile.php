<?php 
require_once('core.php');
session_start();



if (isset($_POST['btnsubmit'])){
  $uid = $_SESSION['uid'];
  $fullname = $_POST['fullname'];
  $passportID = $_POST['passportID'];
  $birthday = $_POST['birthday'];
  $address = $_POST['address'];
  $zipcode = $_POST['zipcode'];
  $phone = $_POST['phone'];
  update_user($uid,$fullname,$passportID,$birthday,$address,$zipcode,$phone);
}

if (!isset($_SESSION['uid'])){
  header('location:index.php');
}
else{
  $data = get_profile_edit($_SESSION['uid']);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
    <title>Forex Login</title>    
    <link rel="stylesheet" href="<?= base_url; ?>assets/css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='<?= base_url; ?>assets/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?= base_url; ?>assets/css/login.css"> 
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url; ?>assets/css/bootstrap.css" />  
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    <script type="text/javascript" src="<?= base_url; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url; ?>assets/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
      <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    
</head>
<body>
	<div class="pen-title">
  <h1>Forex Profile</h1>
</div>
<div class="container" id="profile">
	<div class="card alt">
    <div class="toggle" id="toggle"></div>
    <h1 class="title">EDIT
      <div class="close"></div>
    </h1>
    <form method="POST" action="">
      <div class="input-container">
        <input type="text" id="fullname" name="fullname" autocomplete="off" value="<?php echo $data['fullname'];?>"/>
        <label for="fullname">Fullname</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="passportID" name="passportID" autocomplete="off" value="<?php echo $data['passportID'];?>"/>
        <label for="PassportID">Passport ID</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="birthday" name="birthday" value="<?= $data['birthday'];?>"/>
        <label for="birthday">Birthday</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="pac-input" name="address" value="<?= $data['address'];?>" placeholder=""/>
        <label for="pac-input">Address</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="zipcode" name="zipcode" autocomplete="off" value="<?php echo $data['zipcode'];?>"/>
        <label for="zipcode">Zipcode</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="phone" name="phone" autocomplete="off" value="<?php echo $data['phone'];?>"/>
        <label for="Phone">Phone</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" name="btnsubmit" id="btnsubmit"><span>DONE</span></button>
      </div>
    </form> 
  </div>
</div>
  <script type="text/javascript">
    (function () {
      

      window.onload = function (){document.getElementById("toggle").click();};
      jQuery('#birthday').datetimepicker({
        format: 'YYYY-MM-DD'
      });
    })();

    
    function initAutoComplete() {
      
      var input = document.getElementById('pac-input');

      var autocomplete = new google.maps.places.Autocomplete(input);

    }
  </script>
  <script src="<?= base_url; ?>assets/js/index.js"></script> 
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKV3c5X5Ies--bhSZzYId6-i1K6zwpEo0&libraries=places&callback=initAutoComplete"
        async defer></script>
  
</body>
</html>