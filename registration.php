<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <style>
      @import url('https://fonts.googleapis.com/css?family=Raleway');

      body {
      background: #d2d6de;
      width: 100vw;
      height: 100vh;
      font-family: 'Raleway', sans-serif;
      }

      .info-text {
      font-size: 1rem;
      }

      .wrapper {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      }

      .login-box {
        background: #fff;
        width: 300px;
        height: 430px;
        box-shadow: 5px 5px 5px 1px rgba(0,0,0,0.1);
        text-align: center;
        padding: 20px;
      }

      .form-container {
      display: flex;
      flex-direction: column;
      }

      .form-container .input-addon {
      margin-top: 1.5rem;
      }

      .form-element {
      margin-top: 0.8rem;
      height: 2rem;
      border: 1px solid #d2d6de;
      padding: 5px;
      font-size: .9rem;
      }

      .form-element:focus {
      outline: 1px solid #673ab7;
      }

      .form-element::placeholder {
      font-family: 'Raleway', sans-serif;
      font-size: .8rem;
      }

      .form-element.is-submit {
      height: 3rem;
      font-size: 1rem;
      line-height: normal;
      font-family: 'Raleway', sans-serif;
      background: #673ab7;
      color: #fff;
      }

      .input-addon {
      display: flex;
      }

      .input-addon > .form-element {
      margin-top: 0;
      }

      .input-field {
      flex: 1;
      }

      .input-addon-item {
      padding: 5px;
      width: 35px;
      border: 1px solid #d2d6de;
      border-left: 0;
      background: #fff;
      color: #6a6b6d;
      }

  </style>
</head>
<body>
  <div class="wrapper">
  	<div class="login-box">
  		<h3 class="info-text">User Registration</h3>
  		<form class="form-container" method="post" action="registration.php">
        <?php include('errors.php'); ?>
  			<div class="input-addon">
  				<input name="username" class="form-element input-field" placeholder="Name" type="text" value="<?php echo $username; ?>">


  			</div>
  			<div class="input-addon">
  				<input name="email" class="form-element input-field" placeholder="Email" type="email" value="<?php echo $email; ?>">

  			</div>
  			<div class="input-addon">
  				<input name="password_1" class="form-element input-field" placeholder="Password" type="password">

  			</div>
  			<div class="input-addon">
  				<input name="password_2" class="form-element input-field" placeholder="Re-type password" type="password">

  			</div>
  			<input name="reg_user" class="form-element is-submit" type="submit" value="Create User">
  		</form>
  		<p>Or if you already have an user <a href="login.php">login here.</a></p>
  	</div>
  </div>
</body>

</html>
