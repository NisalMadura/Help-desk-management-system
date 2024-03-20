<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Board of Investment of Sri Lanka</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>  
       
	<div class="limiter">
            
            <img src="images/BOI.png" class="imglogo js-tilt" />
                     
            <div class="container-login100" > <!--style="background-image: url('images/maindash2.png')"-->
			<div class="login100-pic js-tilt">
					<img src="images/img-01.png" alt="IMG" />
				</div>
				
				 
				<span class="login100-form-system-title">
			HELP DESK SYSTEM
			</span>       
				
				<form action="login.php" method="post" class="login100-form " >
					<span class="login100-form-title"  >
						Member Login                                                                                          
                    </span>		<div class="wrap-input100 " >
						<input class="input100" type="text" name="username" placeholder=" User Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 "  >
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
<!--===============user login error msg ==============================================================-->                            
        <center>
                    <div style="color: red; ">                   
                            <?php
                            if(isset($_SESSION['loging_invalid']) )
                            {
                                echo ($_SESSION['loging_invalid']);
                                 unset($_SESSION['loging_invalid']); 
                            }
                            
                             
                            ?>
                    </div>
					
			</center>


<!--===============================================================================================-->
                         
                                        <div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>
                            
                            
                                        <center>
                                            <span style="color:whitesmoke;"> 
                                                   
                                                   
                                                <input class="" type="checkbox" >&nbsp; 
                                                   Remember Password
                                                   
                                            </span> 

					 </center>


				</form>
				                 
				
                    <div class="wrap-login100">                        

			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>     
        
  
</body>
</html>