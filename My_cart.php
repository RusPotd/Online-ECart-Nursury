<html>
<head>
  <style>
    body{
      background-image: url(background.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;

    }
    .container{
      margin-left: 100px;
      width: 80%;
      height: 120px;
      border: thin solid #00FF00;
      margin-bottom: 50px;
    }
    .image{
      width: 120px;
      height: 98%;
      float: left;
      margin-right: 50px;
    }
    .info{
      margin-top: 20px;
      padding: 5px;
      float: left;
    }
    .info_2{
      margin-top: 20px;
      margin-left: 20px;
      padding: 5px;
      float:left;
      margin-right: 30px;
    }
    .br_1{
      font: 9pt Verdana;
      height: 5px;
      font-size: 18px;
    }
    .tank{
      border: thin solid #000000;
      height: auto;
      width: 900px;
      margin-left: 20%;
      margin-top: 100px;
      background-color: white;
    }
    .your_order{
      margin-left: 40%;
      margin-bottom: 100px;
    }
    .prodImage{
      max-width: 100%;
      max-height: 100%;
    }
    .Reg_NOW{
      color: white;
			margin-left: 1200px;
		}
  </style>
</head>
<body>
  <?php
    session_start();

    /*if (!isset($_SESSION['username'])) { ?>
      <script>alert("You must log in first!!!");</script>
      <?php
      header('location: login.php');
    }*/

    $con = mysqli_connect('localhost','root');
  	mysqli_select_db($con, 'nursary');

    $user_name = $_SESSION['username'];   #get user id
    $query = " SELECT  `Id` FROM `users` WHERE username='$user_name' ";
  	$queryfire = mysqli_query($con, $query);
    $User_Id = mysqli_fetch_array($queryfire);
    $User_Id = $User_Id[0];

      ?>
  <div class="Reg_NOW">
		<h3><?php echo $_SESSION['username']; ?></h3>
    <a href="login.php" style="color: white;">logout</a>
  </div>
  <div class='tank'>
    <h1 class="your_order">Your Orders</h1>
    <?php
      if(isset($User_Id)){
        $query = " SELECT `shop_id`, `plant_id`, `Quantity` FROM `cart` WHERE user_id=".$User_Id;
      	$queryfire = mysqli_query($con, $query);
        while($User = mysqli_fetch_array($queryfire)){
          $query1 = "SELECT `name` FROM `shops` WHERE Id=".$User[0];
          $queryfire1 = mysqli_query($con, $query1);
          $Seller_name = mysqli_fetch_array($queryfire1);
          $query1 = "SELECT `Name`, `Price` FROM `nursarycart` WHERE Id=".$User[1];
          $queryfire1 = mysqli_query($con, $query1);
          $Plant= mysqli_fetch_array($queryfire1);

          ?>
          <div class="container">
              <div class="image">
                <?php
                $query2 = " SELECT `image` FROM `nursarycart` WHERE name='$Plant[0]' ";
              	$queryfire2 = mysqli_query($con, $query2);
                $product_2 = mysqli_fetch_array($queryfire2);
                 ?>
                <img src="<?php echo $product_2['image'] ?>" class="prodImage">
              </div>
              <div class="info">
                <strong class="br_1">Plant: <?php echo $Plant[0]; ?></strong><br><br>
                <strong class="br_1">Seller: <?php echo $Seller_name[0]; ?></strong><br><br>
              </div>
              <div class="info_2">
                <strong class="br_1">Quantity: <?php echo $User[2]; ?></strong><br><br>
                <strong class="br_1">Price: <?php echo $Plant[1]; ?></strong><br><br>
              </div>
              <h2 style="margin-top:35px;">Order Placed!</h2>
          </div>
        <?php } }?>
</div>
  </body>
</html>
