<?php
  $con=new mysqli('localhost','root','','categories');
  if (!$con){
    die(mysqli_error($con));
  }
?>