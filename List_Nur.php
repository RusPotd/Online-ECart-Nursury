<html>
<?php
session_start();

if (!isset($_SESSION['username'])) { ?>
  <script>alert("You must log in first!!!");</script>
  <?php
  header('location: login.php');
}

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

#echo $actual_link;
$link_len = strlen($actual_link);
$product_id = substr($actual_link, $link_len-1, $link_len);
$_SESSION['Item_id'] = $product_id;
#$product_id = $_SESSION['Item_id'];
#echo $product_id;
$con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'nursary');

$query = "SELECT `Name`, `Price` FROM `nursarycart` WHERE Id=$product_id";

$queryfire = mysqli_query($con, $query);

$product = mysqli_fetch_array($queryfire);

#$product_name = $_SESSION['Item_name'];
$product_name = $product[0];
$product_price = $product[1];
#$product_price = $_SESSION['Item_price'];

?>

<head>
<style>
    body{
      font: 10pt Verdana;
      color: #000;
      background-image: url(background.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;

    }

    a{
      color: #22697F;
    }

    a:hover{
      color: #2D91A8;
    }

    .bodyWrap
    {
    width: 900px;
    margin: 5% auto;
    }

    .main, .content{
      float: left;
      background: #fff;
    }

    .breadCrumbs{
      float: left;
      padding: 5px 0 5px 10px;
      letter-spacing: 1px;
      line-height: 2em;
      color: #fff;
    }

    .breadCrumbs>a{
      text-decoration: none;
      color: #fff;
    }

    .breadCrumbs>a:hover{
      text-decoration: underline;
    }

    .nav
    {
    background: #ECF3F6;
    padding: 10px;
    margin-bottom: 10px;
    }

    .nav h1
    {
    display: inline-block;
    float: left;
    }

    .sidebar
    {
    float:left;
    min-width: 160px;
    max-width: 198px;
    margin-right: 20px;
    background: #fff;
    }

    .sidebar.slim{
      max-width: 140px;
    }

    .content
    {
    overflow: hidden;
    background: #fff;
    }

    .content p
    {
    padding: 0 0 0 10px;
    }

    .bottom
    {
    width: 100%;
    height: 2.5em;
    border-top: 1px solid #B6B6AB;
    background: #EAEAEA;
    }

    .bd
    {
    border: 1px solid #B6B6AB;
    border-radius: 4px;
    }

    .clearFix:after
    {
    content: " ";
    display: block;
    height: 0;
    clear: both;
    }

    .productStage, .productImage, .overview
    {
      float: left;
    }

    .overview h1, .overview h2, .overview h3
    {
      padding: 0;
      margin: 0 0 10px 0;
    }

    .productStage
    {
      background: #fff;
      width: 700px;
      margin-right: 20px;
    }

    .productImage
    {
      width: 350px;
      text-align: center;
      margin-bottom: 20px;
    }

    .productImage span{
      float: right;
      padding-right: 30px;
    }

    span a{
      text-decoration: none;
    }

    .overview
    {
      float: left;
      width: 320px;
    }


    .button
    {
    display: block;
    color: #fff;
    border-radius: 4px;
    padding: 5px;
    margin: auto;
    margin-bottom: 10px;
    text-decoration: none;
    border-radius:3px;
    text-align: center;
    cursor: pointer;
    }

    .button a:hover
    {
    text-decoration: none;
    }

    .add{
      width: 200px;
      height: 50px;
      line-height: 2em;
      background: #59A80F;
    }

    .add:hover{
      background: #4B8E0D;
    }

    .wish{
      width: 150px;
      background: #45ADA8;
    }

    .wish:hover{
      background: #388B87;
    }

    .submit{
      background: #EAEAEA;
      color: #555;
      float: right;
      text-transform: uppercase;
      font: bold 10px Verdana;
    }

    .blueSubmit{
      background: #22697F;
      color: #fff;
      border: 1px solid #22697F;
    }

    .right{
      float: right;
    }

    .left{
      float: left;
    }

    .imageList { list-style: none; margin: 5px 0px 2px 0px; padding: 0; }
    .imageList li { display: inline; padding: 0; margin: 0 2px;  }
    .imageList a { text-decoration: none; }
    .imageList img { border: 1px solid #D3D3D3; vertical-align: top; }

    .prodSelect{
      width: 100%;
      border-radius: 4px;
      height: 2em;
      outline: none;
      margin-bottom: 15px;
    }

    .rating{
      color: #FC913A;
    }

    .info{
      float: left;
      width: 100%;
    }

    .info h3{
      background: #22697F;
      line-height: 36px;
      padding: 5px 0 5px 20px;
      border-radius: 4px;
      letter-spacing: 1px;
      color: #fff;
      text-shadow:1px 1px 3px rgba(0,0,0,0.5);
      font: 10pt Verdana;
      text-transform: uppercase;
    }

    .description{
      display: inline-block;
      margin: 10px 0 20px 0;
    }

    .specs{
      list-style-type: none;
      margin: 0;
      padding: 0 0 0 10px;
    }

    .specs li{
      padding: 0 0 5px 0;
    }

    .specs h5{
      display: inline;
      font: bold 10pt Verdana;
    }


    .product
    {
    width: 150px;
    padding: 10px 0 0 10px;
    display: inline-block;
    text-align: center;
    font-size: 11px;
    line-height: 14px;
    text-decoration: none;
    margin-bottom: 20px;
    overflow: hidden;
    }

    .product a{
      text-decoration: none;
    }

    .product a:hover{
      text-decoration: underline;
    }

    .product .smallBox
    {
    display: inline-block;
    max-width: 92px;
    max-height: 92px;
    overflow: hidden;
    }

    .product span, .product div
    {
    display: block;
    }

    .soft
    {
    padding-left: 8px;
    }

    .hard
    {
    padding-left: 12px;
    }

    .slim
    {
      padding: 0;
      margin: 0 0 10px 0;
      width: 100%;
      display: block;
    }

    .vtop
    {
    vertical-align: top;
    }

    .vbot
    {
    vertical-align: bottom;
    }

    .manuName
    {
    margin: 10px 0 5px 0;
    font-weight: bold;
    color: #464646;
    }

    .prodName
    {
    color: #464646;
    margin: 0 0 5px 0;
    }

    .prodPrice
    {
    text-decoration: none;
    }

    .review{
      background: #E7F5FD;
      color: #555;
      padding: 10px;
      border-radius: 4px;
      margin-bottom: 15px;
      float: left;
    }

    .review span{
      float: left;
    }

    .review:hover .vote{
      opacity: 1;
    }

    .vote{
      opacity: 0;
      float: right;
      font-weight: bold;
      padding: 15px 0 0 0;
    }

    span.title{
      text-align: left;
      font-weight: bold;
      padding: 0 0 10px 0;
    }

    span.author{
      text-align: right;
      float: left;
      padding: 15px 0 0 0;
    }

    .stars{
      padding: 10px 0;
      display: inline-block;
    }

    .botBorder{
      padding: 10px;
      border: 1px solid #B6B6AB;
      border-top: none;
      border-bottom-left-radius: 4px;
      border-bottom-right-radius: 4px;
      margin-bottom: 20px;
    }

    .folderTab {
    background: #22697F;
    text-shadow: 1px 1px 0 rgba(0,0,0, .8);
    text-align: center;
    color: #fff;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border: 1px solid #22697F;
    }

    .folderTab.sub{
      background: #5196A3;
      border: 1px solid #5196A3;
    }

    .folderTab h3{
      margin: 0;
      padding: 5px 0 5px 20px;
      color: #fff;
      text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
      letter-spacing: 1px;
      font: 10pt Verdana;
      line-height: 2em;
      max-width: 400px;
      text-transform: uppercase;
      text-align: left;
      float: left;
    }

     .folderTab.sub h3{
       text-align: center;
       padding: 5px;
       float: none;
     }

    .submit:hover{
      background: #D2D2D2;
    }

    .blueSubmit:hover{
      background: #184A5A;
      border: 1px solid #184A5A;
    }

    .buy_button{
      height: 30px;
      width: 100px;
      margin-top: 10px;
    }

    .button_1{
      height: auto;
      padding: 20px;
      width: 130px;
    }
    .Manage_side_images{
      height: 80px;
      width: 80px;
    }
    .side_img{
      margin-left: 30px;
      max-height: 100%;
      max-width: 100%;
    }
    .prodImage{
      max-height: 100%;
      max-width: 100%;
    }
    .subprodImage{
      max-height: 40%;
      max-width: 30%;
    }
    .Reg_NOW{
      color: white;
			margin-left: 1200px;
		}
</style>
</head>
<body>

  <?php
  $Nursury_names = array();

  $con = mysqli_connect('localhost','root');

  mysqli_select_db($con, 'nursary');

  $query = " SELECT `name` FROM `shops` WHERE plants='".$product_name."'";
  #echo $query;

	$queryfire = mysqli_query($con, $query);

  $num = mysqli_num_rows($queryfire);

  while ($product = mysqli_fetch_array($queryfire)) {
      array_push($Nursury_names, $product[0]);
  }
  ?>
  <div class="Reg_NOW">
		<h3><?php echo $_SESSION['username']; ?></h3>
    <a href="login.php" style="color: white;">logout</a><br>
    <a href="My_cart.php" style="color: white;">My Orders</a>
  </div>

  <div class="bodyWrap">
    <div class="productStage">
        <div class="folderTab clearFix">
    <div class="breadCrumbs">
      <a href="index.php">Home</a> >
      <a href="#">Product purchase</a>
    </div></div>
  <div class="botBorder clearFix">
      <div class="productImage">
        <?php
        $query = " SELECT `image` FROM `nursarycart` WHERE name='$product_name' ";

      	$queryfire = mysqli_query($con, $query);

        $product_2 = mysqli_fetch_array($queryfire);
         ?>
        <img src="<?php echo $product_2['image'] ?>" class="prodImage">
          <ul class="imageList">
            <li><a href="#"><img class="subprodImage" src="<?php echo $product_2['image'] ?>"></a></li>
            <li><a href="#"><img class="subprodImage" src="<?php echo $product_2['image'] ?>"></a></li>
            <li><a href="#"><img class="subprodImage" src="<?php echo $product_2['image'] ?>"></a></li>
          </ul>
              <span><a href="#"><b>View More</b></a></span>
      </div>
      <div class="overview">
        <h1><?php echo $product_name ?></h1>
        <h2>Seller - <?php echo $Nursury_names[0] ?></h2>
        <span class="rating">
          <img src="http://www.jimmybeanswool.com/secure-html/onlineec/images/stars/4_5StarBlue09.gif">
        </span>
        <h3><?php echo $product_price ?> /-</h4>
        <span>50+ available</span>
        <span class="description">Origin- It originates from South Africa, but it can be found in temperate regions all over the world today.
This type of Plant is a perennial plant. It has a life span of more than 2 years. It is a low-maintenance succulent with delicate pink or white flowers that bloom in the spring.</span>

        <form method="post">
        <input name="quantity" placeholder="Quantity" style="margin-left: 10px; height: 30px; width: 300px; margin-bottom: 20px;"/>
        <script>
          function Confirm_Quantity(){
            alert("Quantity Confirmed! Please select SELLER...");
          }

        </script>
        <input type="submit" class="button add" name='purchase' id='purchase' value="Confirm Quantity" onclick="Confirm_Quantity();"/>
        <?php
          if(isset($_REQUEST['purchase'])){
            $_SESSION['Quantity'] = $_REQUEST['quantity'];?>
        <?php
          }
        ?>
        </form>
      </div>
 <!--product information -->
     <div class="info">
          <h3>Product Information</h3>
          <ul class="specs">
            <li><h5>Plant Type:</h5> Good luck</li>
            <li><h5>Plant height:</h5> 6 inch approx</li>
            <li><h5>Plant location:</h5> Indoors</li>
            <li><h5>Vase Name:</h5> Round Shaped Vase</li>
            <li><h5> Vase Height:</h5> 6 Inches</li>
          </ul>

        <div class="description">
          Please take out the plant from the box immediately after receiving and water it as required.
          <br>Water the soil, not the leaves and flowers.
          <br>Keep it away from direct sunlight.
          <br>Avoid placing plants in trouble spots, such as near heat or air conditioning ducts.
        </div>
       </div>
       <script>
        function pop_up(){
          alert("Order placed successfully!!!");
        }
       </script>
       <!--Top selling nursuries -->
      <div class="info">
          <h3>Top sellers </h3>
        <?php
        for($i = 0;$i < $num;$i++){
          $query = " SELECT `Id` FROM `shops` WHERE name='$Nursury_names[$i]' ";
        	$queryfire = mysqli_query($con, $query);
          $Nursury_Id = mysqli_fetch_array($queryfire);
             ?>
        <div class="product vtop soft">
            <a href="#">
               <div class="smallBox"><img class="prodImage" src="0<?php echo $i ?>.jpg"></div>
               <span class="manuName"><?php echo $Nursury_names[$i] ?></span>
               <span class="prodName"><?php echo $product_name ?></span>
            </a>
             <span class="prodPrice">Price : <?php echo $product_price+($i*1268); ?></span>
             <a href="Place_order.php?nursury=<?php echo $Nursury_Id[0];?>"><input type="button" value="BUy" class="buy_button" onclick="pop_up();"></input></a>
        </div>
        <?php
        }
        ?>

      <!--Product review -->
     <div class="info">
        <h3>Product Reviews</h3>
         <div class="review">
            <span class="title">A favorite
           <br><img class="stars" src="aaa.gif"></span>
              <span class="comments">This is my all time favorite plant. It comes in a zillion colors, is fairly soft to touch , and holds up well over time. Definitely a tried and true standard.</span>
            <span class="author">By kaitmurphy  on April 11, 2014</span>
             <div class="vote">
               Was this review helpful?
               <input type="submit" value="Yes">
              </div>
         </div>

        <div class="review">
          <span class="title">Great Plant!
          <br><img class="stars" src="aaa.gif"></span><br><br><br><br>
            <span class="comments">Looks lite bit straight plant but overall good. Less requirement of water and care.</span>
          <span class="author">By lulu5156 on December 31, 2013</span>
            <div class="vote">
             Was this review helpful?
             <input type="submit" value="Yes">
            </div>
       </div>

            <div class="review">
              <span class="title"> little but nice!
                  <br><img class="stars" src="aaa.gif"></span>

                <span class="comments">I made a mistake in ordering this because I was meaning to order the otherone, which is much softer. But, that being said, this is nice Plant. My kids love it. Colors were true to the website photos.</span>
              <span class="author">By Lucky67 on August 27, 2013</span>
                <div class="vote">
                 Was this review helpful?
                 <input type="submit" value="Yes">
                </div>
           </div>

                    <div class="button_1 bd submit right">Read More Reviews</div>
                    <div class="button_1 submit blueSubmit left">Write a Review</div>
           </div>

        </div>
     </div>
    </div>
    <!--Top searched -->
    <div class="sidebar slim">
      <div class="folderTab sub clearFix">
        <h3>Top searched</h3>
      </div>
      <div class="botBorder">
        <?php

        $query = " SELECT  `name`, `image`, `discount` FROM `nursarycart` ";

      	$queryfire = mysqli_query($con, $query);

        while ($product_1 = mysqli_fetch_array($queryfire)) {  ?>
        <div class="product vtop slim">
            <a href="#">
               <div class="Manage_side_images"><img class="side_img" src="<?php echo $product_1['image'] ?>"></div>
               <span class="manuName"><?php echo $product_1[0] ?></span>
               <span class="prodName"><?php echo $product_1[2] ?>% discount</span>
            </a>
        </div>
      <?php } ?>
      </div>

    </div>
</div>
</body>

</html>
