<?php
include('Cheader.inc');
error_reporting(0);
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'online');

if (isset($_SESSION['lastName'])) {
	//header("Location: ../index.php");
}

if (isset($_POST['submit'])) {
	$lastName = $_POST['lastName'];
	$firstName = $_POST['firstName'];
	$Phone = $_POST['Phone'];
	$Address = $_POST['Address'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM customers WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	if (!$result->num_rows > 0) {
		$sql =  "INSERT INTO customers (lastName, firstName,  adress,  phone,  email , password)
			VALUES ('$lastName','$firstName','$Address','$Phone','$email', '$password' )";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Wow!  Registration Completed.')</script>";
			$lastName = "";
			$firstName = "";
			$Phone = "";
			$Address = "";
			$email = "";
			$_POST['password'] = "";
			header("Location: login.php");
		} else {
			echo "<script>alert('Woops! Something Wrong Went.')</script>";
		}

	} else {
		echo "<script>alert('Woops! Email Already Exists.')</script>";
	}
}
?>

<div class="col-12 p-3">
	<center>
		<h1>Registre</h1>
		<form action="" method="post">
			
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address :</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $email; ?>" required>
				<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
			</div>
			<div class="mb-3">
				<label class="form-label">Last name :</label>
				<input type="text" class="form-control" name="lastName" value="<?php echo $lastName; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">first name :</label>
				<input type="text" class="form-control" name="firstName" value="<?php echo $firstName; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Phone :</label>
				<input type="phone" class="form-control" name="Phone" value="<?php echo $Phone; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Adress :</label>
				<input type="adress" class="form-control" name="Address" value="<?php echo $Address; ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Password :</label>
				<input type="password" class="form-control" name="password" value="<?php echo $_POST['password'];?>" required>
			</div>

		<button name="submit" class="btn btn-dark" >Register</button>
		<br><br>
		<p class="login-register-text">Have an account? <a href="login.php" class="fw-bold link-danger">Login Here</a>.</p>
		</form>
	</center>
</div>

<?php include('Cfooter.inc'); ?>