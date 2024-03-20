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
// select list from mysql tbl_job_status table
$sql_select= "SELECT * FROM tbl_job_status";
$select_rst=mysqli_query($conn,$sql_select);
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
// Onclick validations
  function showData() {    
				 var from_date =document.getElementById("from_date").value ;
				 var from_date1 = new Date(from_date);
				 
				 var to_date =document.getElementById("to_date").value ;
				 var to_date1 = new Date(to_date);
				 
				 var todaysDate = new Date();
				
				          if(from_date=="")
							{
			document.getElementById("msg").innerHTML="Plz Enter Start Date" ;
								//alert("Enter From Date" );	  
								return false ;
							}  
							
						else if (todaysDate<from_date1){
								//alert("Can't Enter Future Date for the from date" );	  
								return false ;
							}
							
							
					   else if (to_date=="")
							{
								document.getElementById("msg").innerHTML="Enter To Date" ;	
								//alert("Enter To Date" );	  
								return false ;
							}  
							
						else if  (todaysDate<to_date1){
								//alert("Can't Enter Future Date for the TO date" );	  
								return false ;
							}

						else if  (from_date1>to_date1){
							//	alert("To date must be greater than from date" );	  
								return false ;
							}
						else{
							
			var certNo1 = document.getElementById('from_date').value;
			var folioNo1 = document.getElementById('to_date').value;
				var status1 = document.getElementById('select').selectedIndex;
			   if (window.XMLHttpRequest) {
	                // code for IE7+, Firefox, Chrome, Opera, Safari
	                xmlhttp = new XMLHttpRequest();
	            } else {
	                // code for IE6, IE5
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function () {
	                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                    document.getElementById("txtData").innerHTML= xmlhttp.responseText;
						// document.getElementById("nShareori").value = xmlhttp.responseText;
	                }
	            }
	           // xmlhttp.open("GET", "cds_true.php?q=" + certNo.value, true);
				
				//xmlhttp.open ("GET", "report_status.php?certNo="+certNo1+"&folioNo="+folioNo1, true)
					xmlhttp.open ("GET", "report_status.php?certNo="+certNo1+"&folioNo="+folioNo1+"&status="+status1,true)
				 //xmlhttp.open("GET", "cds_true.php?S=" + folioNo.value, true);
	            xmlhttp.send();
				return true;
						}
	
						}
</script>

<script>
// onchange validation from date
  function fromdatevali() {  
				 var from_date =document.getElementById("from_date").value ;
				 var from_date1 = new Date(from_date);
				 
				 var to_date =document.getElementById("to_date").value ;
				 var to_date1 = new Date(to_date);
				 
				 var todaysDate = new Date();
				
				          if(from_date=="")
							{
								
					document.getElementById("msg").innerHTML="Plz Enter Start Date" ;		
								
								
								//alert("Enter From Date" );	  
								return false ;
							}  
							
						else if (todaysDate<from_date1){
							document.getElementById("msg").innerHTML="Can't Enter Future Date for the from date" ;		
								  
								return false ;
							}
					else if (to_date=="")
							{
						document.getElementById("msg").innerHTML="Enter To Date" ;	
								//alert("Enter To Date" );	  
								return false ;
							}  
							
						else if  (todaysDate<to_date1){
							document.getElementById("msg").innerHTML="Can't Enter Future Date for the TO date" ;	
								//alert("Can't Enter Future Date for the TO date" );	  
								return false ;
							}

						else if  (from_date1>to_date1){
					document.getElementById("msg").innerHTML="To date must be greater than from date" ;	
							//	alert("To date must be greater than from date" );	  
								return false ;
							}
									else {
							document.getElementById("msg").innerHTML="" ;	
		}
			

  }

</script>

<script>
// onchange validation to date
  function todatevali() {  
				 var from_date =document.getElementById("from_date").value ;
				 var from_date1 = new Date(from_date);
				 
				 var to_date =document.getElementById("to_date").value ;
				 var to_date1 = new Date(to_date);
				 
				 var todaysDate = new Date();
				 
				 
				 				          if(from_date=="")
							{
								
					document.getElementById("msg").innerHTML="Plz Enter Start Date" ;		
								
								
								//alert("Enter From Date" );	  
								return false ;
							}  
							
						else if (todaysDate<from_date1){
							document.getElementById("msg").innerHTML="Can't Enter Future Date for the from date" ;		
								  
								return false ;
							}
					else if (to_date=="")
							{
						document.getElementById("msg").innerHTML="Enter To Date" ;	
								//alert("Enter To Date" );	  
								return false ;
							}  
							
						else if  (todaysDate<to_date1){
							document.getElementById("msg").innerHTML="Can't Enter Future Date for the TO date" ;	
								//alert("Can't Enter Future Date for the TO date" );	  
								return false ;
							}

						else if  (from_date1>to_date1){
					document.getElementById("msg").innerHTML="To date must be greater than from date" ;	
							//	alert("To date must be greater than from date" );	  
								return false ;
							}
		
		else {
							document.getElementById("msg").innerHTML="" ;	
		}


  }

</script>



	
   
 <!-- css for select  list-->	         
<style>
.select-css {
	<!-- display: block; -->
	font-size: 14px;
	font-family: sans-serif;
	font-weight: 700;
	color: #444;
	line-height: 1.3;
	padding: .6em 1.4em .5em .8em;
	width: 23%;
	max-width: 100%;
	box-sizing: border-box;
	margin: 0;
	border: 1px solid #aaa;
	box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
	border-radius: .5em;
	-moz-appearance: none;
	-webkit-appearance: none;
	appearance: none;
	background-color: #fff;
	background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
	  linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
	background-repeat: no-repeat, repeat;
	background-position: right .7em top 50%, 0 0;
	background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
	display: none;
}
.select-css:hover {
	border-color: #888;
}
.select-css:focus {
	border-color: #aaa;
	box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
	box-shadow: 0 0 0 3px -moz-mac-focusring;
	color: #222;
	outline: none;
}
.select-css option {
	font-weight:normal;
}
</style>

<!-- css end-->  

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <?php include('navbar.php'); ?> 

  <!-- ------------------------------------------------------------------------------------------------------- -->
  <div class="content-wrapper">
  
   <div class="container-fluid">
        <ol id="hide1" class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">JOB Status</li>
								<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
      </ol>


	   
	<div id="mainPage">
	      <center>
		<div class="card-header"  id="hide" style="width:1090px;" >
			
	      <center>
		  	<b>FROM :-  </b> &nbsp;<input type="date" id='from_date' onchange="return fromdatevali();"> &nbsp; &nbsp;
			<b>TO :- </b> &nbsp;<input type="date" id='to_date' onchange="return todatevali();"> &nbsp; &nbsp; 
			<select name="userID"  id="select" class="select-css"  >
								<option  value =""> All Jobs Status</option>
								<?php  	while($row1 =mysqli_fetch_array($select_rst)):;			 ?>
								<option value ="<?php  	echo $row1[0] ;?>"> <?php  	echo $row1[1] ;	?> </option>
								<?php  	endwhile;	?>																				
								</select>
	&nbsp;&nbsp; 
		<button type="button" style="border-radius: 12px; width:100px;" onclick="return showData();" class=" btn-info">Search</button>
		
	         <!--  <input type="text" id="txtsearch" class="form-control" autocomplete="on" onfocus="this.value=''"  style="width:600px;" onclick="showData()" placeholder="Search here..." /> </center>
			  rrr
            <br />
            <center><button type="button" style="border-radius: 12px;  " onclick="showData()" class="btn btn-info">Search</button></center>
            <br />  -->
<br>
		<span style="color:red;" id="msg"> 
		</span>
		   
<b>  



<span style="color:green;"> <?php 
                    if (isset($_SESSION['message_suc']))
					{ 		echo $_SESSION['message_suc'];
							unset($_SESSION['message_suc']); 
					}
?> 

</span> </b>
			
            </div>
                  
            </center>
		
 
 
 
 
 
	   </div>
	   
<div id="txtData" style="">

 
 </div>	   
	   
	   
	   

    <div class="card-body"  >
    <div id="infoPage" class="animated slideInRight">
    <div id="info"></div>
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
  

