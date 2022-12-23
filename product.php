<?php
  include 'conection.php';
  $id=$_GET['productid'];
  $sql= "select * from categories where Id =$id";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  $image=$row['Image'];
  $name=$row['Name'];
  $type=$row['Type'];
  $price=$row['Price'];
  $description=$row['Description'];
  if (isset($_POST['update'])) {
    $Image=$_POST['image'];
    $Name=$_POST['name'];
    $Type=$_POST['type'];
    $Price=$_POST['price'];
    $Description=$_POST['description'];
    $sql="update `categories` set Id=$id,Image='image/$Image',Name='$Name',Type='$Type',Price='$Price',Description='$Description' where id = $id";
    $result = mysqli_query($con,$sql);
    if ($result) {
      header('location:Admin.php');
    } else {
      die(mysqli_error($con));
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product</title>
  <!-- syle file -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/Product.css">
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
      <h1><a href="home.php">Store</a></h1>
      <div class="links">
        <i class="fa-solid fa-bars"></i>
        <ul>
          <li><a href="home.php">HOME</a></li>
          <li class="menu">
            <span class="menu">CATEGORIES</span>
            <ul>
              <li><a href="GraphicCard.php">Graphic Card</a></li>
              <li><a href="processor.php">Processor</a></li>
              <li><a href="Matherboard.php">Motherbord</a></li>
              <li><a href="Ram.php">Ram</a></li>
            </ul>
          </li>
          <li><a href="">CONTACT US</a></li>
        </ul>
        <div class="card">
          <i class="fa-sharp fa-solid fa-cart-shopping"></i>
          <span id="NOP"></span>
          <span id="total"></span>
          <div class="purchases">
            <p>Your Card Is Empity</p>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header -->
  <!-- start product section -->
  <section class="product">
    <div class="contaner">
      <div class="cards">
        <div class="card">
          <div class="image">
            <a href=""><img src="<?php echo $image?>" alt="<?php echo $image?>"></a>
          </div>
          <div class="info">
            <p>
              <a href=""><?php echo $name?> </a>
            </p>
            <span><?php echo $price?> LE</span>
            <button>Add Card</button>
          </div>
        </div>
      </div>
      <h1>Description</h1>
      <div class="desc">
        <p>
        <?php echo $description?>
        </p>
      </div>
    </div>
  </section>
  <!-- end product section -->
  <!-- sound -->
  <audio src="sounnd/Add.mp3" id="add"></audio>
  <audio src="sounnd/delete.mp3" id="delete"></audio>
<!-- file js -->
  <script src="js/main.js"></script>
</body>
</html>