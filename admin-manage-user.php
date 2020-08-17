<?php
require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}

// check admin or sales man
$user_role = $_SESSION['user_role'];
if ($user_role != 1) {
  header('Location: sale-now.php');
}

if(isset($_GET['delete_salesman'])){
  $action_id = $_GET['admin_id'];
  
  $sql = "DELETE FROM tbl_admin WHERE admin_id = :id";
  $sent_po = "admin-manage-salesman.php";
  $obj_admin->delete_data_by_this_method($sql,$action_id,$sent_po);
}

$page_name="Admin";
include("include/header.php");

if(isset($_POST['add_new_employee'])){
  $obj_admin->add_new_user($_POST);
}

?>



<!--modal for customer add-->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title text-center">Add Employee Info</h2>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="" method="post" autocomplete="off">
                <div class="form-horizontal">

                  <div class="form-group">
                    <label class="control-label col-sm-4">Fullname</label>
                    <div class="col-sm-6">
                      <input type="text" placeholder="Enter Employee Name" name="em_fullname" list="expense" class="form-control input-custom" id="default" required>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="control-label col-sm-4">Username</label>
                    <div class="col-sm-6">
                      <input type="text" placeholder="Enter Employee username" name="em_username" class="form-control input-custom" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-4">Email</label>
                    <div class="col-sm-6">
                      <input type="text" placeholder="Enter Employee Email" name="em_email" class="form-control input-custom" required>
                    </div>
                  </div>
                 
                  
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-3">
                      <button type="submit" name="add_new_employee" class="btn btn-success-custom">Add Employee</button>
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-danger-custom" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


<div class='multi-action'>
  <button class="action-button" data-toggle="modal" data-target="#myModal"><span class='glyphicon glyphicon-plus plus-rotate'></span></button>
</div>

<!--modal for customer add-->



    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <ul class="nav nav-tabs nav-justified nav-tabs-custom">
            <li><a href="manage-admin.php">Manage Admin</a></li>
            <li class="active"><a href="admin-manage-user.php">Manage Salesman</a></li>
          </ul>
          <div class="gap"></div>
          <div class="table-responsive">
            <table class="table table-codensed table-custom">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Temp Password</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody>

              <?php 
                $sql = "SELECT * FROM tbl_admin WHERE user_role = 2";
                $info = $obj_admin->manage_all_info($sql);
                $serial  = 1;
                $total_expense = 0.00;
                while( $row = $info->fetch(PDO::FETCH_ASSOC) ){
              ?>
                <tr>
                  <td><?php echo $serial; $serial++; ?></td>
                  <td><?php echo $row['fullname']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['temp_password']; ?></td>
                  
                  <td><a title="Update Employee" href="update-employee.php?admin_id=<?php echo $row['user_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;<a title="Delete" href="?delete_salesman=delete_salesman&admin_id=<?php echo $row['user_id']; ?>" onclick=" return check_delete();"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                
              <?php  } ?>


                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


<?php
if(isset($_SESSION['update_user_pass'])){

  echo '<script>alert("Password updated successfully");</script>';
  unset($_SESSION['update_user_pass']);
}
include("include/footer.php");

?>