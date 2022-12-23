<?php
    include 'conection.php';
    if(isset($_POST["submit"])) {
        $firstname=$_POST["Firstname"];
        $lasttname=$_POST["Lastname"];
        $Phone=$_POST["Phone"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirmpassword=$_POST["confirmpassword"];
        $duplicate=mysqli_query($con,"select * from  users where Firstname='$firstname' or Email='$email'");
        if (mysqli_num_rows($duplicate) > 0) {
            echo "<script>alert('username or Email has already Taken');</script>";
        } else {
            if ($password == $confirmpassword) {
                $query = "insert into users values('','$firstname','$lasttname','$Phone','$email','$password','user')";
                mysqli_query($con,$query);
                echo "<script>alert('Registration Successfly');</script>";
            } else {
                echo "<script>alert('password does not Match');</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
        <!-- style css -->
        <link rel="stylesheet" href="css/form.css">
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
                <h1>Sign Up</h1>
                <div class="overlay2"></div>
                <div>
                    <input type="text" name="Firstname" id="name" required placeholder="First Name">
                </div>
                <div>
                    <input type="text" name="Lastname" id="LastName" required placeholder="Last Name">
                </div>
                <div>
                    <input type="text" name="Phone" id="Phone" maxlength="11" required placeholder="Phone">
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div>
                    <input type="password" name="password" id="password" required minlength="6" maxlength="20" placeholder="password">
                </div>
                <div>
                    <input type="password" name="confirmpassword" id="password" required minlength="6" maxlength="20" placeholder="Confirm password">
                </div>
                <div>
                    <input type="submit" name="submit" value=" Sign Up">
                    <input type="reset" name="reset" value=" reset">
                </div>
            </form>
        </div>
    </section>
</body>
</html>