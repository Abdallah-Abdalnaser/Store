<?php
    include 'conection.php';
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $username=$_POST["Firstname"];
        $password=$_POST["password"];
        $sql="select * from users where Firstname = '".$username."' AND Password = '".$password."'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        if ($row["Type"]=="user") {
            header("location:home.php");
        }elseif($row["Type"]=="admin") {
            header("location:Admin.php");
        } else {
            echo "<script>alert('username or password incorrect');</script>";
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>
        <!-- style css -->
        <link rel="stylesheet" href="css/sign up.css">
        <!-- normalize file -->
        <link rel="stylesheet" href="css/normaliz.css">
        <!-- fontawsam library -->
        <link rel="stylesheet" href="css/all.min.css">
        <!-- google font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Teko:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
    </head>
    <body>
        <section>
            <div class="overlay"></div>
            <div class="contaner">
                <h1>Store</h1>
                <form action="" method="post">
                    <h1>Sign In</h1>
                    <div class="overlay2"></div>
                    <div>
                        <input type="text" name="Firstname" id="name" required placeholder="First Name">
                    </div>
                    <div>
                        <input type="password" name="password" id="password" minlength="6" maxlength="20" required placeholder="password">
                    </div>
                    <div class="info">
                        <p>New in Store? <a href="form.php">Sign Up Now</a></p>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Sign In">
                    </div>
                </form>
            </div>
        </section>
    </body>

</html>
