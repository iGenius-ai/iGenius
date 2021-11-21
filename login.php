<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/database/db.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/student.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/lineawesome/css/line-awesome.css">
  <link rel="stylesheet" href="assets/css/login.css">

  <title>Student Portal | Login</title>
</head>
<body>
  
  <div class="center">
    <h2>Login</h2>

    <form action="login.php" method="post">

    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

      <div class="login-field">
        <input type="text" name="reg_number" value="<?php echo $reg_number; ?>" required>
        <span></span>
        <label for="">Reg. Number</label>
      </div>

      <div class="login-field">
        <input type="password" name="password" id="<?php echo $password; ?>" required>
        <span></span>
        <label for="">Password</label>
      </div>

      <input type="submit" name="login-btn" value="Login">
      <div class="signup">
        Not admitted? <a href="">Signup</a>
      </div>
    </form>
  </div>

</body>
</html>