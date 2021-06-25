<?php
include('../database/databaseConnection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>تسجيل الدخول</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>مكتبتي</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">تسجيل الدخول لصفحة  لوحة التحكم</p>

      

      <?php

      if($_SERVER['REQUEST_METHOD']=='POST'){
      	$username=$_POST['username'];
      	$password=$_POST['password'];
     
      	if(!empty($username)&& !empty($password)){
      	$password_encrypt=md5($password);
    	  $query="SELECT * from users where username='$username' AND password='$password_encrypt'";
    	
    	  $result=mysqli_query($connection,$query);

    	  if(mysqli_num_rows($result)>0){
    	  	session_start();
    	  	$_SESSION['is_login']=true;
    	  	$_SESSION['name']=$username;
    	  	header("Location: http://localhost/web_course_project/templates/dashboard_home.php ");
    	  }else{
    	  	echo'<div class="card-header bg-red">
              	  <h3 class="card-title">Login Faild</h3>
          			  </div>';
    	  }
    	}else{

    		echo'<div class="card-header bg-red">
              	  <h3 class="card-title">Some Feild Is Empty</h3>
          			  </div>';
    	}

      }



	?>


      <form action="" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="اسم المستخدم">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input  name="password" type="password" class="form-control" placeholder="كلمة المرور">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
   
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 ">
       <a href="../public">الرئيسية</a>
      </p>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
