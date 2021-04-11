<html>
<body>
  <?php
    session_start();
    $_SESSION['order_placed'] = true;

    if (!isset($_SESSION['username'])) { ?>
      <script>alert("You must log in first!!!");</script>
      <?php
      header('location: login.php');
    }

    $con = mysqli_connect('localhost','root');
  	mysqli_select_db($con, 'nursary');

    $user_name = $_SESSION['username'];   #get user id
    $query = " SELECT  `Id` FROM `users` WHERE username='$user_name' ";
  	$queryfire = mysqli_query($con, $query);
    $User_Id = mysqli_fetch_array($queryfire);
    $User_Id = $User_Id[0];

    #echo $User_Id;

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $link_len = strlen($actual_link); #get seller id
    $Seller_Id = substr($actual_link, $link_len-1, $link_len);

    #echo $Seller_Id;

    $Item_Id = $_SESSION['Item_id'];  #get plant

    #echo $Item_Id;

    $Quantity = $_SESSION['Quantity'];
    #echo $Quantity;

    $query = " INSERT INTO cart VALUES('$User_Id','$Seller_Id', '$Item_Id', '$Quantity') ";
  	$queryfire = mysqli_query($con, $query);

    header("location: index.php");  ?>
  </body>
</html>
