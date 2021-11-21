<?php 
	include("path.php"); 
	include(ROOT_PATH . "/app/database/db.php");
	include(ROOT_PATH . "/app/controllers/student.php");
	include(ROOT_PATH . "/app/controllers/department.php");
	include(ROOT_PATH . "/app/controllers/courses.php");

	if (!isset($_SESSION['username'])) {
		header("location: " . BASE_URL . "/login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
		<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="assets/lineawesome/css/line-awesome.css">
		<script src="assets/js/jquery-3.5.1.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>

    <title>Student Portal | Admin</title>
</head>
<body>

	<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<h2><span class="las la-laptop-code"></span> <span>CSC Dept.</span></h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="<?php echo (BASE_URL . "/index.php"); ?>" class="active"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/profile.php"); ?>"><span class="las la-user-edit"></span> <span>Profile</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/student/students.php"); ?>"><span class="las la-users"></span> <span>Students</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/student/add_student.php"); ?>"><span class="las la-user-plus"></span> <span>Add Student</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/courses/course.php"); ?>"><span class="las la-book-open"></span> <span>Courses</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/courses/add_course.php"); ?>"><span class="las la-edit"></span> <span>Add Courses</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/faculty/fac.php"); ?>"><span class="la la-android"></span> <span>Faculties</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/faculty/add.php"); ?>"><span class="las la-edit"></span> <span>Add Faculty</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/department/dept.php"); ?>"><span class="lab la-hubspot"></span> <span>Department</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/views/department/add.php"); ?>"><span class="la la-exchange"></span> <span>Add Department</span></a></li>
				<li><a href="<?php echo (BASE_URL . "/logout.php"); ?>"><span class="la la-sign-out"></span> <span>Logout</span></a></li>
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

				<?php if (isset($_SESSION["id"])): ?>
					<img src="<?php echo BASE_URL . '/assets/images/' . $_SESSION['image']; ?>" width="42px" height="40px">
				<div>
					<h4><?php echo $_SESSION["username"]; ?></h4>
					<small><?php echo $_SESSION["reg_number"]; ?></small>
				</div>
				<?php else: ?>
					<li><a href="">Signup</a></li>
					<li><a href="">Login</a></li>
				<?php endif; ?>

			</div>
		</header>

		<main>
			<div class="cards">
				<div class="card-single">
					<div>
						<?php
							$query = "SELECT id FROM students ORDER BY id";
							$run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($run);

							echo "<h1> ".$row." </h1>";
						?>
						<span>Students</span>
					</div>
					<div>
						<span class="las la-users"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<?php
							$query = "SELECT id FROM courses ORDER BY id";
							$run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($run);

							echo "<h1> ".$row." </h1>";
						?>
						<span>Courses</span>
					</div>
					<div>
						<span class="las la-book-open"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<?php
							$query = "SELECT id FROM departments ORDER BY id";
							$run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($run);

							echo "<h1> ".$row." </h1>";
						?>
						<span>Departments</span>
					</div>
					<div>
						<span class="lab la-hubspot"></span>
					</div>
				</div>
				<div class="card-single">
					<div>
						<?php
							$query = "SELECT id FROM faculty ORDER BY id";
							$run = mysqli_query($conn, $query);

							$row = mysqli_num_rows($run);

							echo "<h1> ".$row." </h1>";
						?>
						<span>Faculties</span>
					</div>
					<div>
						<span class="la la-android"></span>
					</div>
				</div>
			</div>

			<div class="recent-grid">
				<div class="projects">
					<div class="card">
						<div class="card-header">
							<h3>All Students</h3>
							<a href="<?php echo (BASE_URL . "/views/student/students.php"); ?>" class="see_" href="index.php">See all <span class="las la-arrow-right"></span></a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="formTable" width="100%">
									<thead>
										<tr>
											<th style="width: 50px;">S/N</th>
											<th style="width: 350px;">Student Name</th>
											<th style="width: 140px;">Matric. No</th>
											<th colspan="2">Department/Faculty</th>
											<th>Level</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($students as $key => $student): ?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td><?php echo $student["username"]; ?></td>
												<td><?php echo $student["reg_number"]; ?></td>
												<td><?php echo $student["department"]; ?></td>
												<td><?php echo $student["school"]; ?></td>
												<td><?php echo $student["level"]; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="customers">
					<div class="card">
						<div class="card-header">
							<h3>All Courses</h3>
							<a href="<?php echo (BASE_URL . "/views/courses/course.php"); ?>" class="see_">See all <span class="las la-arrow-right"></span></a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="" class="display" width="100%">
									<thead>
										<tr>
											<th style="width: 50px;">S/N</th>
											<th>Course Title</th>
											<th style="width: 170px;">Course Code</th>
											<th style="width: 150px;">Course Unit</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($courses as $key => $course ): ?>
											<tr>
												<td><?php echo $key + 1; ?></td>
												<td><?php echo $course["course_title"]; ?></td>
												<td><?php echo $course["course_code"]; ?></td>
												<td><?php echo $course["course_unit"]; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>

		</main>
	</div>
	
	<script>
		$(document).ready(function(){
			$('#formTable').DataTable({
				"order": [[1, 'asc']]
			});
		});
		$(document).ready(function(){
			$('table.display').DataTable();
		});
	</script>
</body>
</html>