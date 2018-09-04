<!DOCTYPE html>
<?php include '../includes/connection.php';
session_start();
IF(ISSET($_SESSION['username']))
{
	header('Location: index.php');
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/kesuapps.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/css/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index"><b>Admin</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login to start your session</p>
    <?php
      if(isset($_POST['submit']))
      {
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = sha1($password);
        $query  = mysqli_query($con, "SELECT * FROM user where username = '{$user_name}' and password = '{$hashed_password}' limit 1" );
        if(!$query) mysqli_error($con);
        if(mysqli_num_rows($query)==1)
        {
          $data_user=mysqli_fetch_array($query);
          $_SESSION['username']=$user_name;
          $_SESSION['user_type']=$data_user[5];
          $_SESSION['name']=$data_user[1];
          //$_SESSION['rm']=$data_user[7];
          if(isset($_POST['remember_me']))
          {
            $hour = time() + 3600;
            setcookie('remember_me', $user_name, $hour);
            setcookie('pwd', $password, $hour);
          }
          header('Location: index');    
        }
        else
        {
          //echo "Sorry ! Wrong username Password combination. Please Try Again.";
              ?>
          <div class="alert alert-warning">
          		<strong><?php echo "Sorry ! Wrong username Password combination. Please Try Again.";?></strong> 
          </div>
        <?php 
        }
      }
    ?>
    <form action="<?Php $_SERVER['PHP_SELF']?>" method="post">
      <div class="form-group has-feedback">
        <input type="username" name = 'username' class="form-control" placeholder="Username" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name = 'password' class="form-control" placeholder="Password"required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name = "remember_me"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name = 'submit'>Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>    
    <!-- /.social-auth-links -->
    <a href="#">I forgot my password</a><br>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/js/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
