<?php
include('Cheader.inc');
$conn = mysqli_connect('localhost', 'root', '', 'online');

session_start();
error_reporting(0);

if (isset($_SESSION['lastName'])) {
	header("Location: ../index.php");
	//echo "<script>alert(' your are loged in.')</script>";
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM customers WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['lastName'] = $row['lastName'];
		
		header("Location: ../index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}
?>

<div class="col-12 p-3">
	<center>
		<h1> Login </h1>
		<form action="" method="POST" class="login-email" >

			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
			</div>
			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<button name="submit" class="btn btn-dark "> Login</button>
			<br><br>
			<p class="login-register-text">Don't have an account? <a href="register.php"  class="fw-bold link-danger">Register Here</a>.</p>
		</form>
	</center>
</div>

<?php include('Cfooter.inc'); ?>