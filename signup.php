<!--
Name: Saleh Mohamed Ahmed Abdelaal
Matric: A19EC4058
-->
<?php require_once("config.php");?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Signup Page</title>
    <!-- bootstrap, jquery, and sweet alert includes (css/js)-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--my css-->
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
	<div>
		<?php
			if(isset($_POST['signup'])) {
				$username = $_POST['username'];
				$password = $_POST['password'];
				$email = $_POST['email'];
				if(!isset($username) || trim($username) == '')
				{
					header('Refresh: 2; URL = signup.php');
					exit("<svg onload='alert(`enter username please`);'>");
				}
				if(!isset($password) || $password == 'da39a3ee5e6b4b0d3255bfef95601890afd80709')
				{
					header('Refresh: 2; URL = signup.php');
					exit("<svg onload='alert(`enter password please`);'>");
				}
				if(!isset($email) || trim($email) == '')
				{
					header('Refresh: 2; URL = signup.php');
					exit("<svg onload='alert(`enter email please`);'>");
				}
				$sql_u = "SELECT * FROM users WHERE username=?";
				$stmtinsert_u = $db->prepare($sql_u);
				$stmtinsert_u->execute([$username]);
				$result_u = $stmtinsert_u->fetchAll();
				count($result_u);
				if(count($result_u) > 0){
					header('Refresh: 2; URL = signup.php');
					exit("<svg onload='alert(`Username already taken`);'>");
				}
				$sql = "INSERT INTO users (username, password, email) VALUES(?,?,?)";
				$stmtinsert = $db->prepare($sql);
				$result = $stmtinsert->execute([$username, sha1($password), $email]);
				if($result){
					header("location: index.php");
				}
			}

		?>
	</div>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
                    <h2>Join</h2>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="signup.php" method="post">
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
                        <div class="input-group mb-4">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input required type="text" name="email" class="form-control input_user" value="" placeholder="e-mail">
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="signup" id="signup" class="btn login_btn">Signup</button>
				   </div>
					</form>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
