<?php
include('dbconfig.php');

//check whether user login with session 
if (isset($_SESSION['userType'])and $_SESSION['userType']=="A" ) {  


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
   


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <?php include('navbar.php'); ?> 

  <!-- ------------------------------------------------------------------------------------------------------- -->
  <div class="content-wrapper">
  
   <div class="container-fluid">
        <ol class="breadcrumb" id="hide1">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Repair History </li>
								<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
      </ol>
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
	            xmlhttp.open("GET", "search_history.php?q=" + s.value, true);
	            xmlhttp.send(); 
                }
	    }
		
		
		
       </script>

	
	
	
	   
<div id="mainPage" >
	      <center>
         
	   <center>
	            <input type="text" id="txtsearch" class="" style="width:200px;"  placeholder="Search here..." />
       
            <button type="button" style="border-radius: 12px;  " onclick="showData()" class="btn-info">Search</button></center>
            <br />
			
            
<b>  <span style="color:green;"> <?php 
                    if (isset($_SESSION['message_suc']))
					{ 		echo $_SESSION['message_suc'];
							unset($_SESSION['message_suc']); 
					}
?> 

</span> </b>
			
       
                  
            </center>
			
 </div>
			
			
 <div id="txtData" style="">

 
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
  

