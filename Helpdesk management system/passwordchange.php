<?php
include('dbconfig.php') ;


//check whether user login with session 
if (isset($_SESSION['userType'])) {  


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
	
 if (isset($_SESSION['userName'])) {
		
		
		$userName=$_SESSION['userName'];
		
		
		}

        else{
             $userName="";
            }
	
	
			
			

if (count($_POST) > 0) {
    
  $passwd=  md5($_POST["currentPassword"]);
  $newpasswd= md5($_POST["newPassword"]);
    
    
    $result = mysqli_query($conn, "SELECT *from tbl_users WHERE user_code='$userName'");
    $row = mysqli_fetch_array($result);
    if ($passwd == $row["password"]) {
        mysqli_query($conn, "UPDATE tbl_users set password='$newpasswd' WHERE user_code='$userName'");
        $message1 = "Successefully Password Changed";
    } else
        $message = "Current Password is not correct";
}


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

  <!-- Navigation-->
  
     <?php include('navbar.php'); ?> 
  
  <!-- --------------------------------------------------------------------------------------------------------->
  <div class="content-wrapper">
  
    <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Settings  </li>
		
								<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
		
		
      </ol>

    
	   
	
	   
	   

      <div class="card-header">Change the Password  </div>
      
      <?php
      
      
      

?>
      
      
      
      <div class="card-body"  >
        <form   method="post" name="frmChange"  action=""
        onSubmit="return validatePassword()" >
          
   		   
          <div class="form-group">
		 
		  
            <div class="form-row">
              <div class="col-md-4">
                 
              <center>Enter Current Password </center>
              </div>
			
              <div class="col-md-4">
               
                  <input class="form-control" name="currentPassword" type="password"  placeholder="Current Password" > 
                 
              </div> 
		
               <span id="currentPasswordmsg" style="color:#ff6666;"></span>         <span style="color:#ff6666;"><?php if(isset($message)) { echo $message; } ?>  </span>
                
            </div>
			 
         </div>
	
		  
		  


		  
        
            
  		   
          <div class="form-group">
		 
		  
            <div class="form-row">
              <div class="col-md-4">
                 
         <center>     Enter New Password </center>
              </div>
			
              <div class="col-md-4">
               
                 <input class="form-control" name="newPassword" type="password" id="newPassword" placeholder="New Password"> 
                 
              </div> 
		
                <span id="newPasswordmsg" style="color:#ff6666;"></span>
            </div>
			 
         </div>
	
            
       <div class="form-group">
		 
		  
            <div class="form-row">
              <div class="col-md-4">
                 
            <center> Confirm New Password  </center>
              </div>
			
              <div class="col-md-4">
               
                <input class="form-control" id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm Password" >  
                 
              </div> 
		<span id="confirmPasswordmsg" style="color:#ff6666;"></span>	  
            </div>
			 
         </div>   
            
            
            
            
            
            
            
            
            
            
            
<center>
		
    <input type="submit" value="Update" name="submit" class="btn btn-primary" >   </br> <span style="color: green;">   </br></br><?php if(isset($message1)) { echo $message1; } ?>  </span>
		 
		 
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
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPasswordmsg").innerHTML = "     * Current Password is required";
	output = false;
}
else
{
 	currentPassword.focus();
	document.getElementById("currentPasswordmsg").innerHTML = "";  
    
}



if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPasswordmsg").innerHTML = "*  New Password is required";
	output = false;
        
}
else
{
 	newPassword.focus();
	document.getElementById("newPasswordmsg").innerHTML = "";  
    
}

if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPasswordmsg").innerHTML = "*  Confirm Password is required";
	output = false;
}


if(newPassword.value !== confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPasswordmsg").innerHTML = "* Password is not same";
	output = false;
} 	
return output;
}
</script>

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
        $('#availability').html('<span class="text-danger">Username not available</span>');
        $('#register').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Username Available</span>');
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

