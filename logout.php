<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   $_SESSION["valid"] = false;
   echo '
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
					<div class="container h-100">
						<div class="d-flex h-100">
							<div class="user_card container" style="padding-top: 50px;">
								<div class="col align-items-start">
									<div class="d-flex justify-content-center mb-4" >
										<h2 style="">Logged out<br>successfully</h2>
									</div>
									<div class="d-flex justify-content-center" style="margin: 10px;">
										<p id="footer">Saleh Mohamed © 2021</p>
									</div>	
								</div>
							</div>
						</div>
               </div>
         </body>
					';
   header('Refresh: 2; URL = index.php');
?>