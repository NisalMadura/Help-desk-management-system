<?php
include("dbconfig.php");
if (isset($_POST['submit']))
	{	  


$username=$_POST['username'];
$password=$_POST['password'];
$encrpitedpass= md5($password);


$query = mysqli_query($conn,"SELECT * FROM tbl_users WHERE user_code='$username' and password='$encrpitedpass' and status='1' ");

$row = $query->fetch_assoc();

	
	
	if (mysqli_num_rows($query) != 0)
		{
								// profile picture
                                  $_SESSION['pic']= $row['pro_pic'];
								  
								  //user Type
								  $_SESSION['userType']= $row['usr_type'];
                                  
								  //user Title
								  $_SESSION['title']= $row['title'];
								  
								  //Display Name
                                  $_SESSION['displayName']= $row['disp_name'];
								  
								  //user code 
                                  $_SESSION['userName']= $row['user_code'];
					
					//  Get User type= Vendor  and direct redirect to dashboard.php 			  
						if($_SESSION['userType']=="V" ) 
								{
														  
								echo "<script language='javascript' type='text/javascript'> location.href='dashboard.php' </script>";
								//report user get sessoin
								$_SESSION['vendor_co1']= $row['venodor_code'];
								

					// Other users to  rederect to user_select.php		
								}
						else
								{
									echo "<script language='javascript' type='text/javascript'> location.href='user_select.php' </script>";		
								}							
			
		}

	  else
		{
			
						// display the User Name Or Password Invalid...! 
		
								$_SESSION['loging_invalid']="User Name Or Password Invalid...!";
								header("location:index.php");
		}	

}
    
?>

