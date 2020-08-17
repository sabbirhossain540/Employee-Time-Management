<?php
require 'authentication.php'; // admin authentication check 

// auth check
if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  $user_name = $_SESSION['admin_name'];
  $security_key = $_SESSION['security_key'];
  if ($user_id != NULL && $security_key != NULL) {
    header('Location: dashboard.php');
  }
}

if(isset($_POST['login_btn'])){
 $info = $obj_admin->admin_login_check($_POST);
}

$page_name="Login";
include("include/login_header.php");

?>

<div class="row">
	<div class="col-md-4 col-md-offset-3">
		<div class="well" style="position:relative;top:20vh;">
			<form class="form-horizontal form-custom-login" action="" method="POST">
			  <div class="form-heading">
			    <h2 class="text-center">Sign In</h2>
			  </div>
			  <h4 style="color:red;"><?php if(isset($info)){echo $info;}?></h4>
			  <div class="login-gap"></div>
			  <div class="form-group">
			    <input type="email" class="form-control" placeholder="Email" name="admin_email" required/>
			  </div>
			  <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
			    <input type="password" class="form-control" placeholder="Password" name="admin_password" required/>
			  </div>
			  <button type="submit" name="login_btn" class="btn btn-default pull-right">Sign In</button>
			</form>
		</div>
	</div>
</div>


<?php

include("include/footer.php");

?>
