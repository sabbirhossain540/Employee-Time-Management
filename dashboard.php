<?php

require 'authentication.php'; // admin authentication check
// auth check temp_password
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$temp_password = $_SESSION['temp_password'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}

$page_name="Home";
include("include/header.php");
?>

<div class="row">
<div class="gap"></div>
<div class="gap"></div>
  <div class="col-md-12">

    <div class="well">
      <div class="row">
        <div class="col-md-12 text-center">
          <marquee><span style="color: green;"> Hello <strong>Sabbir</strong>. Welcome to <strong> Employee Management System</strong></span></marquee>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row">

  	<div class="col-md-12">
    	<div class="well well-custom">
      		<div class="row">

      			<?php
      			     if($user_role == 1){
    			?>

      			<div class="col-md-4"><a class="btn btn-success-custom btn-dash" href="sale-now.php">Sale Now</a></div>
      			<div class="col-md-4"><a class="btn btn-success-custom btn-dash" href="product-all.php">Products</a></div>
      			<div class="col-md-4"><a class="btn btn-success-custom btn-dash" href="accounts-sales.php">Accounts</a></div>
      			<div class="col-md-4"><a class="btn btn-success-custom btn-dash" href="admin-banking.php">Banking</a></div>
      			<div class="col-md-4"><a class="btn btn-success-custom btn-dash" href="admin-account-panel.php">Admin</a></div>

      			<?php 

      				}else if($user_role == 2){

      			?>

      			<div class="col-md-4"><a class="btn btn-success-custom btn-dash" href="sale-now.php">Sale Now</a></div>
      			<div class="col-md-4"><a class="btn btn-success-custom btn-dash" href="product-all.php">Products</a></div>

      			<?php

      				}

      			?>

      			<div class="col-md-4"><a class="btn btn-danger-custom btn-dash" href="?logout=logout">Log Out</a></div>
        	</div>
    	</div>
	</div>
</div>

<?php

include("include/footer.php");

?>
