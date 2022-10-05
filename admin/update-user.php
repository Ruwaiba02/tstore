<?php include "header.php"; ?>

<?php
        include('config.php');

        $id = $_GET['id'];
        
        $query = "SELECT * FROM `user` WHERE `user_id` = '$id'";

        $result = mysqli_query($conn , $query);

        $row = mysqli_fetch_row($result);


        if(isset($_POST['btnupdate']))
        {
            $fname = $_POST['f_name'];
            $lname = $_POST['l_name'];
            $username = $_POST['username'];
            $role = $_POST['role'];
           

            $Squery = "UPDATE `user` SET `first_name`='$fname',`last_name`='$lname',`username`='$username',`role`='$role' where `user_id` = '$id'";
            $Sresult = mysqli_query($conn,$Squery);

            if($Sresult)
            {
                header('location:users.php');
            }
            else{
                echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
            }
        }

    ?>




  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="" method ="POST">

                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['1']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['2']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['3']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['4']; ?>">
                              <option value="Normal User">normal User</option>
                              <option value="Admin">Admin</option>
                          </select>
                      </div>
                      <input type="submit" name="btnupdate" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
