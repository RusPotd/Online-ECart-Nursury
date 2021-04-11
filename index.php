<!DOCTYPE html>
<?php
	session_start();

	if (!isset($_SESSION['username'])) {
?>
	<a href="registration.php" class="Reg_NOW">Register Now</a>
<?php
	}
?>

<html>
<head>
	<title></title>


	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">

  <style type="text/css">

  	#heading { color: #1D8348; padding-top: 30px; padding-bottom: 25px; }

  	body{

  	 	background-image: url(background.jpg);
  	}

		.Reg_NOW{
			margin-left: 1000px;
		}
  	.input-group {

  		margin-top: 10px;
  		margin-bottom: 30px;
		}
		.NODECO{

		text-decoration: none;
		color: initial;
		}

		.new_button{
			width: 253px;
		}
  </style>



</head>
<body class="container">
	
	<!-- logged in user information -->
	<?php  if (isset($_SESSION['username'])) : ?>
		<p style="color: white;" class="Reg_NOW"><strong><?php echo $_SESSION['username']; ?></strong><br>
	  <a href="login.php" style="color: white;">logout</a><br>
		<a href="My_cart.php" style="color: white;">My Orders</a></p>
	<?php endif ?>
	<h1 id="heading" class = "text-center mb-7"> NURSARY</h1>

	<div  class="input-group mb-5">

    <input class="form-control" type="text" placeholder="Search Plants...">

    <div class="input-group-append">

      <span class="input-group-text"><a href="index.php"><i class="fa fa-envelope-o fa-fw"></i></a></span>

    </div>

    </div>


	<div class="row">

	<?PHP

	$con = mysqli_connect('localhost','root');

	mysqli_select_db($con, 'nursary');

	// if ($con) {
	// 	echo "connection successful";

	// }else{
	// 	echo "no connection";
	// }

	$query = " SELECT  `name`, `image`, `price`, `discount` FROM `nursarycart` order by id ASC ";

	$queryfire = mysqli_query($con, $query);

	$num = mysqli_num_rows($queryfire);

	$temp = 1;
	if($num > 0) {
		while ($product = mysqli_fetch_array($queryfire)) {
			?>


			<div class="col-leg-3 col-md-3 col-sm-12">


				<form>

					<div class="card">

						<h6 class="card-title bg-info text-white p-2 text-uppercase"> <?php echo $product['name'];
						 ?> </h6>

						<div class="card-body">

							<img src="<?php echo $product['image']; ?>" alt = "tre" class = "img-fluid mb-4" >

							<h6> &#8377; <?php echo $product['price']; ?>
							<span> (<?php echo $product['discount']; ?>% off)</span></h6>

							<h6 class = "badge badge-success"> 4.4 <i class="fa fa-star"></i></h6>

						</div>

						<div class="d-flex">

								<a href="List_Nur.php?id=<?php echo $temp;?>" class="NODECO">
								<input type="button" value="Proceed to purchase" class = "btn btn-warning flex-fill new_button">
								</input>
								</a>

							<?php
							$temp++;
							?>


						</div>


					</div>
				</form>

			</div>



	<?php

		}
	}
	?>


</div>
</body>
</html>
