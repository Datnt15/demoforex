<?php
require_once('core.php');
session_start();

// resgister
if (isset($_POST['btnsubmit'])){
  $username = $_POST['username'];
  $pass = $_POST['password'];
  $repass = $_POST['repassword'];
  $email = $_POST['email'];
  create_user($username,$pass,$email);
}

// login
if (isset($_POST['btnlogin'])){
  $user = $_POST['user'];
  $pw = $_POST['pw'];
  if (login($user,$pw)){
    header('location: ' . base_url . 'profile.php');
  }
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Forex Login</title>    
    <link rel="stylesheet" href="<?= base_url; ?>assets/css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='<?= base_url; ?>assets/css/font-awesome.min.css'>
    <link rel="stylesheet" href="<?= base_url; ?>assets/css/login.css">   
    <script src="<?= base_url; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript">
     
    // $(document).ready(function(){
    // check password and repassword are the same or not
      function checkPass(){
          var check = 0;
          var pass = document.getElementById('password');
          var repass = document.getElementById('re_password');
          var message = document.getElementById('confirmMessage');
          
          var goodColor = "#66cc66";
          var badColor = "#fff";
          //Compare the values in the password field and repassworf field
          if(pass.value == repass.value){
              // pss match
              $('#btnsubmit').removeAttr('disabled');
              message.style.color = goodColor;
              message.innerHTML = "<i class='fa fa-check' aria-hidden='true'></i>"
          }else{
             // pss wrong
              $('#btnsubmit').attr('disabled','disabled');
              message.style.color = badColor;
              message.innerHTML = "<i class='fa fa-times' aria-hidden='true'></i>"
          }
      }  

      // ajax check username resgister available or not  
        function check_username() {
          var username = $('#username').val();
          $.get("check_username.php", { username: username },  
              function(result){ 
                // not available
                  if(result > 0){ 
                      $('#username').addClass('existed');  
                      $('#noti_user').html(username + ' is not available');
                      $('#btnsubmit').attr('disabled','disabled');
                  }
                // available
                  else if (result == 0){
                      $('#noti_user').html('');
                      $('#username').removeClass('existed').addClass('available'); 
                      $('#btnsubmit').removeAttr('disabled'); 
                  }  
              });  
          }  

        // ajax check email resgister available or not  
        function check_email() {
          var email = $('#email').val();
          $.get("check_email.php", { email: email },  
              function(result){ 
                // not available
                  if(result > 0){ 
                      $('#email').addClass('existed');  
                      $('#noti_email').html(email + ' is not available');
                      $('#btnsubmit').attr('disabled','disabled');
                  }
                // available
                  else if (result == 0){
                      $('#noti_email').html('');
                      $('#email').removeClass('existed').addClass('available');  
                      $('#btnsubmit').removeAttr('disabled');
                  }  
              });  
          }  
        // });
    </script>
  </head>
  <body>
<div class="pen-title">
  <h1><a href="index.html">Forex Login</a></h1>
</div>
<div class="container">

<!-- login -->
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="POST">
      <div class="input-container">
        <input type="text" id="user" name="user" required="required" autocomplete="off"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="pw" name="pw" required="required" autocomplete="off"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" name="btnlogin"><span>Login</span></button>
      </div>
    </form>
  </div>

<!-- resgister -->
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form method="POST">
      <div class="input-container">
        <input type="text" id="username" name="username" required="required" onkeyup="check_username()" autocomplete="off"/>
        <label for="Username">Username</label>
        <span id="noti_user"></span>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="email" id="email" name="email" required="required" onkeyup="check_email()" autocomplete="off"/>
        <label for="Email">Email</label>
        <span id="noti_email"></span>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="password" name="password" required="required" autocomplete="off"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="re_password" name="repassword" required="required" onkeyup="checkPass(); return false;" autocomplete="off"/>
        <label for="Repeat Password">Repeat Password</label>
        <span id="confirmMessage" class="confirmMessage"></span>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit" name="btnsubmit" id="btnsubmit" disabled="disabled"><span>Sign me up</span></button>
      </div>
    </form>
  </div>
</div>
    <script src="<?= base_url; ?>assets/js/index.js"></script>   
  </body>
</html>
