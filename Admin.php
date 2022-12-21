<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <!-- syle file -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/Admin.css">
  <!-- normalize file -->
  <link rel="stylesheet" href="css/normaliz.css">
  <!-- fontawsam -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- goole font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
  <!-- start loading -->
  <div id="loading">
    <div class="imgloading"></div>
    <img src="image/loading icon/computer-desktop.png" alt="">
  </div>
  <!-- end loading -->
  <!-- start header -->
  <header>
    <div class="contaner">
      <h1><a href="index.html">Store</a></h1>
      <i class="fa-solid fa-right-from-bracket"></i>
    </div>
  </header>
  <!-- end header -->
  <div class="details">
    <div class="contaner">
      <table>
        <thead>
          <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Update & Delet</td>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'conection.php';
            $sql="select * from `categories`";
            $result2= mysqli_query($con,$sql);
            if($result2) {
              while ($row=mysqli_fetch_assoc($result2)) {
                $id=$row['Id'];
                $image=$row['Image'];
                $name=$row['Name'];
                $price=$row['Price'];
                echo '
                    <tr>
                      <td>
                        <img src="'.$image.'" alt="">
                      </td>
                      <td>
                        '.$name.'
                      </td>
                      <td>
                        '.$price.'
                      </td>
                      <td>
                        <div class="update-delet">
                          <button><a href="update.php?updateid='.$id.'">Update</a></button>
                          <button> <a href="delete.php?deleteid='.$id.'">Delete</a></button>
                        </div>
                      </td>
                    </tr>
                ';
              }
            }
          ?>
        </tbody>
      </table>
      <button class="Add"><a href="Add.php">Add product</a></button>
    </div>
  </div>
<!-- file js -->
  <script src="js/Admin.js"></script>
</body>
</html>