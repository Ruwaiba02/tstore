<?php 
require('auth_session.php');
include('config.php');
include "header.php";
 ?>

<?php
    include("config.php");

    $query = "SELECT * FROM `user`";

    $result = mysqli_query($conn,$query);

    if(!$result)
    {
        echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
    }

?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>

                      <?php
                        while($row=mysqli_fetch_assoc($result))
                            {
                        ?>
                      
                      <tbody>
                      <tr>
                        <td><?php echo $row['user_id'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['role'];?></td>
                        <td>
                        <a href="update-user.php?id=<?php echo $row['user_id'];?>"><i class='fa fa-edit'></i></a>
                        </td>
                        <td>
                        <a href="delete-user.php?id=<?php echo $row['user_id']?>"><i class='fa fa-trash-o'></i></a>
                        </td>
                        </tr>
                         
                      </tbody>
        
                      <?php } ?>
        
                    </table>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>