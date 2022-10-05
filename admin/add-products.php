<?php include "header.php"; ?>



<?php
                if (isset($_POST["submit"])) {
                    $user_fname = $_POST["fname"];
                    $user_lname = $_POST["lname"];
                    $user_name = $_POST["user"];
                    $user_password = md5($_POST["password"]);
                    $user_role = $_POST["role"];

                    include "config.php";

                    $query = "SELECT * FROM `user` WHERE username = '{$user_name}'";

                    $result  = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "user already exist";
                    } else {
                        $query1 = "INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('{$user_fname}','{$user_lname}','{$user_name}','{$user_password}','{$user_role}')";

                        $result1 = mysqli_query($conn, $query1);

                        header("Location:add-user.php");
                    }
                }


                ?>




  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Products</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="products_title">Title</label>
                          <input type="text" name="products_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="productsdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" selected> Select Category</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Product image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
