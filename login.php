<!--
Name: Saleh Mohamed Ahmed Abdelaal
Matric: A19EC4058
-->
<?php require_once("config.php");?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Login Page</title>
    <!-- bootstrap, jquery, and sweet alert includes (css/js)-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--some custom css-->
	<link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
	<div>
		<?php
			session_start();
			$result = "";
			$_SESSION["valid"] = false;
			if(isset($_POST['login'])) {
				$username = $_POST['username'];
				$password = sha1($_POST['password']);

				if(!isset($username) || trim($username) == '')
				{
					header('Refresh: 2; URL = login.php');
					exit("<svg onload='alert(`enter username please`);'>");
				}
				if(!isset($password) || $password == 'da39a3ee5e6b4b0d3255bfef95601890afd80709')
				{
					header('Refresh: 2; URL = login.php');
					exit("<svg onload='alert(`enter password please`);'>");
				}
				$sql = "SELECT * FROM users WHERE username = ? and password = ?";
				$stmt = $db->prepare($sql);
				$stmt->execute([$username,$password]);
				$result = $stmt->fetchAll();
				if(count($result) > 0)
				{
					$_SESSION['valid'] = true;
					$_SESSION['timeout'] = time();
					$_SESSION['username'] = $username;
					header("location: index.php");
				}
			}
		?>
	</div>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
                    <h2>Welcome</h2>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="login.php" method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input autocomplete="off" required type="text" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input autocomplete="off" required type="password" name="password" class="form-control input_pass" value="" placeholder="password">
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" id="login" name="login" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Don't have an account? <a href="signup.php" class="ml-2">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
