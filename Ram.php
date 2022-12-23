<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ram</title>
  <!-- syle file -->
  <link rel="stylesheet" href="css/style.css">
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
      <h1>Ram</h1>
      <div class="cards GridSystem">
        <?php
          include 'conection.php';
          $sql="select * from categories where Type ='Ram'";
          $result2= mysqli_query($con,$sql);
          if($result2) {
            while ($row=mysqli_fetch_assoc($result2)) {
              $id=$row['Id'];
              $image=$row['Image'];
              $name=$row['Name'];
              $price=$row['Price'];
              echo '
                  <div class="card">
                  <div class="image">
                    <a href="product.php?productid='.$id.'"><img src="'.$image.'" alt="MSI GeForce GTX 1050 Ti 4GT OC 4GB GDDR5"></a>
                  </div>
                  <p>
                    <a href="product.php?productid='.$id.'">'.$name.'</a>
                  </p>
                  <span>'.$price.' LE</span>
                  <button>Add Card</button>
                </div>
              ';
            }
          }
        ?>
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