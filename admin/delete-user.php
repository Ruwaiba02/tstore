<?php
    include('config.php');

    $id = $_GET['id'];
    $query= "DELETE FROM `user` WHERE `user_id` = '$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('location:users.php');

    }
    else{
        echo "<script>alert('Error : ".mysqli_error($conn)."');</script>";
    }
?>
