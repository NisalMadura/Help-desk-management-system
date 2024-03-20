<?php
include('dbconfig.php');
?>
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
   
  	<script type="text/javascript">
function showData() {
           
                
                var s = document.getElementById('txtsearch');
                //alert(l.value + " and " + d.value);
                if(s){
                   if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	                xmlhttp = new XMLHttpRequest();
	            } else {
	                // code for IE6, IE5
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function () {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                    document.getElementById("txtData").innerHTML = xmlhttp.responseText;
	                }
	            }
	            xmlhttp.open("GET", "job_NO.php?q=" + s.value, true);
	            xmlhttp.send(); 
                }
	    }
		
		
		
       </script>
	   
       <script type="text/javascript">
            function infoPage(cardno){
            var main = document.getElementById('mainPage');
            var info = document.getElementById('infoPage');
            var cardno = cardno;
            
            main.style.display = "none";
            info.style.display = "block";
            
	            if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	                xmlhttp = new XMLHttpRequest();
	            } else {
	                // code for IE6, IE5
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function () {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                    document.getElementById("info").innerHTML = xmlhttp.responseText;
	                }
	            }
	            xmlhttp.open("GET", "job_InfoPage.php?cardno=" + cardno, true);
	            xmlhttp.send();
            }
       </script> 
   

   
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="images/sierradash.png" class="" style=" width: 25%; 	 z-index :1;  " />
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	 <div class="nav-item">
	  </div>
	  
	  <div class="nav-item" style="margin-top:15px;">
   
		


  </div>
  <div class="nav-item" style="margin-top:10px;">
   <img src="upload/<?php echo $_SESSION['pic']; ?>" onerror="this.src='images/avatar.png';" class="w3-circle w3-margin-right" style="border-radius: 50px; width:60px; position:relative ;left:10px; top:0px; ">   
		
	<span style="color:white; position:relative; left:55px; bottom:10px; ">  Welcome!  </span> <br> 
	<span style="color:white; position:relative; left:80px; bottom:30px; "><strong>Mr. R C K jayarathne<?php //echo $_SESSION['Name'] ?></strong></span>

  </div>
  
  
  <span class="dropdown-divider "></span>
		  
		
		  
		  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
		

		
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="">
            <i class="fa fa-fw fa fa-plus-circle "></i>
            <span class="nav-link-text">Create New Job</span>
          </a>
        </li>
		
		
     	
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" >
            <i class="fa fa-fw fa fa-hourglass-half"></i>
            <span class="nav-link-text">Pending Jobs</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="">Helpdesk Officer</a>
            </li>
			 <li>
              <a href="">Operation Staff</a>
            </li>
			<li>
              <a href="">Authorization Officer</a>
            </li>
			
            <li>
              <a href="">Vendor</a>
            </li>
			
			
			
          </ul>
        </li>
		
		
		
		   <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="">
            <i class="fa fa-fw fa-user-plus "></i>
            <span class="nav-link-text"> Create New User</span>
          </a>
        </li>
		
<li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="">
            <i class="fa fa-fw 	fa fa-check-square-o "></i>
            <span class="nav-link-text">  View Job Status  </span>
 

          </a>
        </li>
		
		
		
<li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link" href="">
            <i class="fa fa-fw 	fa-area-chart "></i>
            <span class="nav-link-text">  Reports  </span>
 

          </a>
        </li>	

	
		
		
    <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"  href="#collapseComponents2" >
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Settings</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2" >
            <li>
              <a href="">Change the Password</a>
            </li>
			 <li>
              <a href=""> Update Details</a>
            </li>
          </ul>
        </li>
			
    
     
       
      </ul>
	  

  
     <ul class="navbar-nav ml-auto ">
	  
	  <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
           <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       </li>
	  
	  
	  </ul>
	  
	  
	  
	  
	  
    </div>
  </nav>
  
  
  
  <!-- ------------------------------------------------------------------------------------------------------- -->
  <div class="content-wrapper">
  
   <div class="container-fluid">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Job Status</li>
      </ol>

    
	   
	<div id="mainPage">
	      <center>
            <div class="card-header" >
	   <center>
	            <input type="text" id="txtsearch" class="form-control" autocomplete="on" onfocus="this.value=''"  style="width:300px;" onkeyup="showData()" placeholder="Enter Job Reference No..." /> </center>
            <br />
            <center><button type="button" style="border-radius: 12px;  " onclick="showData()" class="btn btn-info">Search</button></center>
            <br />
            
<b>  <span style="color:green;"> <?php 
                    if (isset($_SESSION['message_suc']))
					{ 
							echo $_SESSION['message_suc'];
							unset($_SESSION['message_suc']); 

					}

?> 

</span> </b>
			
            </div>
                  
            </center>
 <div id="txtData" style=""><b></b></div>	
	   </div>
   
	   
	    

    <div class="card-body"  >
    <div id="infoPage" class="animated slideInRight">
    <div id="info"></div>
	
	

    </div>
	      

	
    </div>
		

		
		
		
		
		
		
		
		
		
		
		
		
		

  
  
  </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright @ Sierra | IT Department 2018</small>
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
        $('#availability').html('<span class="text-danger">Username is already exist</span>');
        $('#register').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Username is not Available</span>');
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






	
	




	   
	      
    
















