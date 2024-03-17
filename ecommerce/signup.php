<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $now = time();
    if($now >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>

      <div class="register-box-body">
          <h2>Registration</h2>
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#tab1">Customer</a></li>
              <li><a data-toggle="tab" href="#tab2">Seller</a></li> 
          </ul> 
          <div class="tab-content">
              <div id="tab1" class="tab-pane fade in active">
                <div class="register-box-body"> 
                  <p class="login-box-msg">Register a new customer</p>

                  <form action="register.php" method="POST">
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                      </div> 
                      <hr>
                      <div>
                          <button type="submit" class="btn btn-primary" style="background-color:#ffbd59;color:black" name="signup">Sign Up</button>
                      </div> 
                  </form>
                  <br>
                  <a href="login.php">I already have a Account</a><br>
                  <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </div>
              </div>
              <div id="tab2" class="tab-pane fade">
                <div class="register-box-body"> 
                  <p class="login-box-msg">Register a new seller</p>

                  <form action="register_seller.php" method="POST">
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="company" placeholder="Company Name (Optional)" value="<?php echo (isset($_SESSION['company'])) ? $_SESSION['company'] : '' ?>" >
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      </div>
                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                      </div> 
                      <hr>
                      <div>
                          <button type="submit" class="btn btn-primary" style="background-color:#ffbd59;color:black" name="signup">Sign Up</button>
                      </div> 
                  </form>
                  <br>
                  <a href="login.php">I already have a Account</a><br>
                  <a href="index.php"><i class="fa fa-home"></i> Home</a>
                </div>
              </div> 
          </div>
      </div>
  	
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>