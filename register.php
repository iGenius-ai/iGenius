<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/student.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/lineawesome/css/line-awesome.css">
  <link rel="stylesheet" href="assets/css/portal.css">
  <link rel="stylesheet" href="assets/css/table.css">
  <link rel="stylesheet" href="assets/css/register.css">

  <title>Student Portal | Login</title>
</head>
<body>
<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<h2><span class="las la-laptop-code"></span> <span>CSC Dept.</span></h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href=""><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
				<li><a href="views/profile.php"><span class="las la-user-edit"></span> <span>Profile</span></a></li>
				<li><a href=""><span class="las la-users"></span> <span>Students</span></a></li>
				<li><a href="" class="active"><span class="las la-user-plus"></span> <span>Add Student</span></a></li>
				<li><a href=""><span class="las la-book-open"></span> <span>Courses</span></a></li>
				<li><a href=""><span class="las la-file-invoice"></span> <span>Invoices</span></a></li>
				<li><a href=""><span class="la la-sign-out"></span> <span>Logout</span></a></li>
			</ul>
		</div>
	</div>

	<div class="main-content">
		<header>
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label> Dashboard
			</h2>
			
			<div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="Search here">
			</div>

			<div class="user-wrapper">
				<img src="assets/images/images.png" width="30px" height="30px" alt="">
				<div>
					<h4><?php echo $_SESSION["username"]; ?></h4>
					<small>Administrator</small>
				</div>
			</div>
		</header>

		<main>
			<div class="profile">
        <div class="profile-heading">
          <h3 class="profile-title">Add Student</h3>
        </div>
        <div class="profile-body">
          <div class="profile-container">
						<form action="register.php" method="post">

						<?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

							<div class="form-box">
								<div class="login-field">
									<input type="text" name="username" value="<?php echo $username; ?>" required>
									<span></span>
									<label for="">Full Name</label>
								</div>

								<div class="login-field">
									<input type="text" name="reg_number" value="<?php echo $reg_number; ?>" required>
									<span></span>
									<label for="">Reg. Number</label>
								</div>

								<div class="login-field">
									<input type="text" name="phone" value="<?php echo $phone; ?>" required>
									<span></span>
									<label for="">Phone Number</label>
								</div>
							</div>

							<div class="form-box">
								<div class="login-field">
									<input type="text" name="school" value="<?php echo $school; ?>" required>
									<span></span>
									<label for="">School</label>
								</div>

								<div class="login-field">
									<input type="text" name="department" value="<?php echo $department; ?>" required>
									<span></span>
									<label for="">Department</label>
								</div>

								<div class="login-field">
									<input type="password" name="password" value="<?php echo $password; ?>" required>
									<span></span>
									<label for="">Password</label>
								</div>
							</div>
							
							<div class="form-box">
								<div class="login-field">
									<input type="date" name="birth_date" value="<?php echo $birth_date; ?>" required>
									<span></span>
									<label class="dob" for="">Date of Birth</label>
								</div>

								<div class="login-field">
									<input type="text" name="origin_state" value="<?php echo $origin_state; ?>" required>
									<span></span>
									<label for="">State of Origin</label>
								</div>

								<div class="login-field">
									<input type="text" name="level" value="<?php echo $level; ?>" required>
									<span></span>
									<label for="">Level</label>
								</div>
							</div>

							<div class="form-box-2">
								<div class="login-field">
									<input class="address" type="text" name="res_address" value="<?php echo $res_address; ?>" required>
									<span></span>
									<label for="">Residential Address</label>
								</div>

								<div class="login-field">
									<input class="address" type="email" name="email" value="<?php echo $email; ?>" required>
									<span></span>
									<label for="">Email Address</label>
								</div>
							</div>

							<div class="signup">
								<p style="text-align: center; margin: 10px 0; font-size: 15px;">Please cross-check student details before admitting the student.</p>
								<input type="submit" name="add-student" value="Add Student">
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>

</body>
</html>