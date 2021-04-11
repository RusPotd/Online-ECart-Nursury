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
        height: 400px;
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
      height: 3rem;
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

  </style>
</head>
<body>
  <div class="wrapper">
  	<div class="login-box">
  		<h3 class="info-text">User Login</h3>
      <?php include('server.php') ?>
      <?php include('errors.php'); ?>
  		<form class="form-container" method="post" action="login.php">
  			<div class="input-addon">
  				<input class="form-element input-field" placeholder="Name" name="username" type="text">
  			</div>

  			<div class="input-addon">
  				<input class="form-element input-field" placeholder="Password" name="password" type="password">
  			</div>

  			<input class="form-element is-submit" type="submit" value="Login" name="login_user">
        <p>
    			Not yet a member? <a href="registration.php">Sign up</a>
    		</p>
  		</form>

  	</div>
  </div>
</body>

</html>
