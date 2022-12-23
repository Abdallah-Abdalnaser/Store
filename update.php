<?php
  include 'conection.php';
  $id=$_GET['updateid'];
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
  <title>Update</title>
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
  <div class="new">
    <form method="post" action="">
      <div class="Add">
        <div class="image">
          <img src="<?php echo $image?>" alt="<?php echo $image?>">
          <input type="file" name="image" selected="<?php echo $image?>">
        </div>
        <div>
          <label for="name">Name</label>
          <input type="text" placeholder="Name" name="name" id="name" value="<?php echo $name?>">
        </div>
        <div>
          <label for="type">type</label>
          <select name="type" id="type">
            <optgroup label="CATEGORIES">
              <option value="processor">processor</option>
              <option value="Matherboard">Matherboard</option>
              <option value="Ram">Ram</option>
              <option value="Graphic Card">Graphic Card</option>
            </optgroup>
          </select>
        </div>
        <div>
          <label for="price">Price</label>
          <input type="text" placeholder="price" name="price" id="price" value=<?php echo $price?>>
        </div>
        <div>
          <label for="description">Description</label>
          <textarea id="description" placeholder="Enter the description" name="description"><?php echo $description?></textarea>
        </div>
        <button name="update">Update</button>
      </div>
    </form>
  </div>
<!-- file js -->
  <script src="js/Admin.js"></script>
</body>
</html>
