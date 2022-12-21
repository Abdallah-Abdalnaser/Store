<?php
  include 'conection.php';
  if (isset($_GET['deleteid'])) {
    $id=$_GET['deleteid'];
    $sql="delete from  `categories` where id = $id";
    $result = mysqli_query($con,$sql);
    if ($result) {
      header('location:Admin.php');
    }else {
      die(mysqli_error($con));
    }
  }
?>