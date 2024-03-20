<?php
include('dbconfig.php') ;

//check whether user login with session 
if (isset($_SESSION['userType'])and $_SESSION['userType']=="H" ) {  

// check before user type session
			if (isset($_SESSION['userType'])) {
		
		
					$userType=$_SESSION['userType'];
			
						}
				else{
					$userType="";
			}    
  

//check before Display Name session
    	if (isset($_SESSION['displayName'])) {
		
		
		$displayName=$_SESSION['displayName'];
		
		
		}
            else{
                $displayName="";
}            
             
//check before title session
    	if (isset($_SESSION['title'])) {		
		
		$title=$_SESSION['title'];		
		
		}

        else{
             $title="";
            }
            
            
//check before pic  session
    	if (isset($_SESSION['pic'])) {
		
		
		$pic=$_SESSION['pic'];
		
		
		}

        else{
             $pic="";
            }
//view the department option list (select from database)
//select option department discription
$sql_select_department= "SELECT * FROM tbl_department";
$department_rst=mysqli_query($conn,$sql_select_department);	

//view the location option list(select from database)
$sql_select_location= "SELECT * FROM tbl_location";
$location_rst=mysqli_query($conn,$sql_select_location);
?>
 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sierra|Help Desk System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/dashboard.css" rel="stylesheet">
  
  <script src="vendor/jquery/jquery220.min.js"></script>
    <script src="vendor/jquery/bootstrap336.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap336.min.js"></script>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

      <div class="content-wrapper">
  
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Create New User  </li>
						<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
      </ol>
      <div class="card-header">Register an Account  </div>
      <div class="card-body"  >
        <form   enctype="multipart/form-data" action="user_registration.php" method="post" >
          
            
          <div class="form-group ">
              
            <b>  <span style="color:green;"> <?php 
                        if (isset($_SESSION['message_suc']))
{ 
echo $_SESSION['message_suc'];
unset($_SESSION['message_suc']); 

}
?> 
                </span> </b><span id="suc_msg" style="color:red;">
  <?php 
        if (isset($_SESSION['pic_less']))
{ 
echo $_SESSION['pic_less'];
unset($_SESSION['pic_less']);
}


?>                   
     </span>
            
		       <div class="form-row ">
						 <div class="col-md-2">
                <label>Title</label>
					<select name="title"  class="form-control" >
						<option value="Mr">Mr</option>
						<option value="Ms">Ms</option>
				</select>	              
              </div>
			
              <div class="col-md-5">
                <label>First name  <Span style="color:red;">*</Span> <Span id='frist'style="color:red;"></Span></label>
                <input class="form-control" name="firstName" id='fristName' type="text"  placeholder="Enter first name" >
              </div>
              <div class="col-md-5">
                <label>Last name <Span style="color:red;">*</Span> <Span id='last'style="color:red;"></Span></label>
                <input class="form-control" name="lastName" id='lastName'  type="text" placeholder="Enter last name" >
		              		
              </div>
            </div>
          </div>
		<div class="form-group">
				<div class="form-row ">
					<div class="col-md-6">
						<label >User Name </label>  <Span style="color:red;">*</Span>    <span id="usmsg" style="color:red;"></span>   <span id="availability"></span> 
						<input class="form-control" name="UserName1" type="text" id="username"  placeholder="Enter Pay code / Vendor Code" >
					</div>
			  
                                        <div class="col-md-6">
				
                                                 <label>Display Name</label> <Span style="color:red;">*</Span>  <Span id='dis'style="color:red;"></Span>
					<input class="form-control" name="displayName" id="displayName" type="text" placeholder="Enter Display Name (Eg:-  R C K Jayarathne)" >
			
					
                                        </div> 
					
					
				</div>
		  </div>	  
		  
		<div class="form-group">
		  
		  <div class="form-row">
				<div class="col-md-7">
                                    <label>Email Address</label> <Span style="color:red;">*</Span> <span id="emailmsg" style="color:red" ></span> 
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Enter email" required>
				</div>
			<div class="col-md-5">
					<label>Contact Number</label> <Span style="color:red;">*</Span>  <span id="conmsg" style="color:red" ></span>
                                        <input class="form-control" id="contactNo"  name="contactNo"   type="text" placeholder="Enter contact Number" > 
				</div> 
           </div>
		</div>
		  
		 
		  
		  <div class="form-group">
		  
		  <div class="form-row">
				<div class="col-md-8">
                                    <label>Profile Picture</label> <span style="color:red; font-size:14px ;">    &NonBreakingSpace; &NonBreakingSpace;  *  Only JPGE, PNG & GIF files are allowed and Upto 100Kb. </span>
					<br/><input  id="img" type="file" name="file" onchange="return validateImage()">
                                        <div id="valid_msg" style="color:red;"> 	</div>
				</div>
			

                      
                      	<div class="col-md-4">
						<label>Account Type</label> <Span style="color:red;">*</Span> 
							<select name="userType"  class="form-control" >
								<option value="H">Admin</option> 
								<option value="R">Report User</option>
								<option value="O">Operation Staff</option>
								<option value="V">Vender</option>
								<option value="U" selected>Client</option>

							</select>	              
					</div>
           </div>
		  
		  </div>
              <div class="form-group">
              <div class="form-row">
              <div class="col-md-6">
                <label >Department</label>  <Span style="color:red;">*</Span> 
                
            
							<select name="department"  class="form-control" >
							<?php  	while($row1 =mysqli_fetch_array($department_rst)):;			 ?>
                                                        <option value ="<?php  	echo $row1[0] ;			 ?>"> <?php  	echo $row1[1] ;			 ?> </option>
                                                        <?php  	endwhile;	?>	
                                                            
							</select>
                
                
              </div>
			
              <div class="col-md-6">
                <label >Location</label> <Span style="color:red;">*</Span> 
                <select name="location"  class="form-control" >
							<?php  	while($row2 =mysqli_fetch_array($location_rst)):;			 ?>
                                                        <option value ="<?php  	echo $row2[0] ;			 ?>"> <?php  	echo $row2[1] ;			 ?> </option>
                                                        <?php  	endwhile;	?>	
                                                            
                                                            
                                                            

							</select>
                
                 
              </div> 
			  
            </div>
			 
         </div>     
            
  		   
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label >Password</label>  
                <input class="form-control" name="password_1" type="password" id="pass1" placeholder="Password" required>
              </div>
			
              <div class="col-md-6">
                <label >Confirm password</label> 
                <input class="form-control" id="pass2" name="password_2" type="password" placeholder="Confirm password" required>  <span id="confirmMessage" class="confirmMessage"></span>
                 
              </div> 
			  
            </div>
			 
         </div>
	

		<center> 
		
		 <button type="submit" name="submit" class="btn btn-primary" id="register" onclick="return checkValidations();"  >Register</button>
		
		    
		 
		  </center>  

            
            

            
            
            
            
        </form>
		 
        </div>

    </div>
	
	
	
	
	
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small> Copyright &copy; Sierra | IT Department 2019</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
         <center>   <h5 class="modal-title" id="exampleModalLabel">Logout</h5></center>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
         <center> <div class="modal-body">Are you sure you want to logout?</div></center>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
	
<script>  
   $('#username').blur(function(){

     var username = $(this).val();

	if(username != ""){
     $.ajax({
      url:'check.php',
      method:"POST",
      data:{UserName1:username},
      success:function(data)
      {
       if(data != '0')
       {
        $('#availability').html('<span class="text-danger">Paycode is already exist</span>');
        $('#register').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Paycode is not Available</span>');
        $('#register').attr("disabled", false);
       }
      }
     })
	} else {
		$('#availability').html('');
		$('#availability').html('');
		$('#register').attr("disabled", true);
	}

  });
 
 
 
</script>

<script> 

function checkValidations()
{
   
            var f =document.getElementById("fristName").value ;
        if(f=="")
          {``
          document.getElementById("frist").innerHTML="Frist Name is empty";
          
          }  
        else
          document.getElementById("frist").innerHTML="";
    
    
    
       var l =document.getElementById("lastName").value ;
            
          if(l=="")
          {
          document.getElementById("last").innerHTML="Last Name is empty";
         
          }   
         else
          document.getElementById("last").innerHTML="";
    
    
    
    
        var dis =document.getElementById("displayName").value ;
            
          if(dis=="")
          {
          document.getElementById("dis").innerHTML="Display Name is empty";
         
          }   
         else
          document.getElementById("dis").innerHTML="";
      
      
    
          var em =document.getElementById("email").value ;
            
          if(em=="")
          {
          document.getElementById("emailmsg").innerHTML="Email is empty";
         
          }   
         else
          document.getElementById("emailmsg").innerHTML="";
    
    
    
    
           var us =document.getElementById("username").value ;
            
          if(us=="")
          {
          document.getElementById("usmsg").innerHTML="User Name is empty";
         
          }   
         else
          document.getElementById("usmsg").innerHTML="";
    
    
        var ab =document.getElementById("contactNo").value ;
        if(ab=="")
          {
          document.getElementById("conmsg").innerHTML="contact number is empty";
           
        }
         else if(isNaN(ab))
        {
          document.getElementById("conmsg").innerHTML="Enter valid contact number";
          return false ;
        } 
        
        else if(ab.length==10 && ab.charAt(0)==0 )  {
              document.getElementById("conmsg").innerHTML="";
          return true ;
        }
        
        else if(ab.length==12 && ab.charAt(0)=='+' )  {
            document.getElementById("conmsg").innerHTML="";
           return true ;
        }
        else{ 
          document.getElementById("conmsg").innerHTML="Enter valid contact number";
          return false ;
      }      
       
    
    
    
    
    
    
    
    
    
    
    
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
	

	if(pass1.value != "" || pass2.value != ""){
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = ""
        return true;
        
    }

	else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        return false;
        
    }
	}
    
   
  
       
   
       
       
       
       
       
       
}  
	
</script>

   <!-- image validation-->
<script>	
function validateImage() {
    var formData = new FormData();
 
    var file = document.getElementById("img").files[0];
 var file1 = document.getElementById("img");
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();

    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
	document.getElementById("img").value = '';
	document.getElementById('valid_msg').innerHTML="Not a Valid file type";
       
        return false;
		
		
    }
    	

    if (file.size > 102400) {
        document.getElementById("img").value = '';
        document.getElementById('valid_msg').innerHTML="Reach Upload Maxsize 100KB";
        
        return false;
    }
		else
	{
	document.getElementById('valid_msg').innerHTML="";
	
	
	}
	

    return true;
    
}





        
        
</script>	
	
	
	
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
  

</body>

</html>

 <?php 
        
    }
         
    else{
        header("location:index.php");
    }
         
    ?>  
  
