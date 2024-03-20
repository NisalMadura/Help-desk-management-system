<?php
include('dbconfig.php');
//check whether user login with session 
if (isset($_SESSION['userType'])and $_SESSION['userType']=="V" ) {  


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

$vendor_code1=$_SESSION['vendor_co1'];	
?>



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


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  
     <?php include('navbar.php'); ?> 
  
  <!-- ------------------------------------------------------------------------------------------------------- -->
  <div class="content-wrapper">
  
   <div class="container-fluid">
      


		
		
 <!-- -----------------------------------------Report user not login user----------------------------------------------- -->		


 <!-- ------------------------------------------------------------------------------------------------------- -->
   
									<?php
//// submit from vendor_com_job.php
							if (isset($_POST['submit4'])) {
										
											$job_no= $_POST['job_no'];
											$action_taken=$_POST['dis1'];
											$ven_com_fin=$_POST['ven_com_fin'];
											$job_status="7";
										
								$sql_update0="UPDATE tbl_jobs SET job_status='$job_status' where job_no='$job_no'";	
								 
								$sql_update00="UPDATE tbl_job_deatails SET  ven_comment='$action_taken',vendor_co_date='$ven_com_fin' where job_no='$job_no'";				
												

										mysqli_query($conn,$sql_update00) ;
										mysqli_query($conn,$sql_update0) ;
										
										 echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Succesfully Complete Job NO :- ".$job_no."  </b>  </span> </center>";
									
		
$job_no= $_POST['job_no'];
		
									
}

//// end submit vendor_com_job.php	

	$sql_cost = "SELECT * FROM tbl_repair_head WHERE job_no='$job_no'";	
		$result3= mysqli_query($conn,$sql_cost);

				while ($row_cost = $result3->fetch_assoc()){
						
					$cost_quatation=$row_cost['total_cost'];		
				}

//end cost 		

?>
			   

	  <!-- body -->    

<div class="card-body"  >
<div id="content">
	<button class="btn-success" style="float: right;" onclick="javascript:window.print()"><span class="fa fa-fw fa-print"></span> Print Report</button>		
				
	<center> 
	
						</br> </br>
						<img src="images/sierradash.png" class="" style=" width: 25%; 	 z-index :1;  " />	
						</br>
						
							No 23, Havelock Road Colombo 05, Sri Lanka </br>
							TEl:- 0112 584 681	FAX:- 0112 598 175
							<H5> Payment Receipt  </H5>
							</center>
						
				
				</br>
							<div >
									<table  align="right" style='font-size: 12px;' cellspacing="0">
														
																		<tr>		
																		  <td>JOB NO</td>
																		  <td>:-</td>
																		  <td><?php echo $job_no;  ?></td>
																		</tr>
																	 
																	  <tbody>
																	<tr>		
																		  <td>RECEPIT NO</td>
																		  <td>:-</td>
																		  <td><?php echo "R02". $job_no;  ?></td>
																		</tr> 
																	  
																	<tr>		
																		  <td>DATE</td>
																		   <td>:-</td>
																		  <td>
																			<?php
																			date_default_timezone_set("Asia/colombo");
																			echo date("Y-m-d h:i:sa");
																			?>
																		  </td>
																	</tr>
																	
																															
			
																		
																	  </tbody>
																	</table>
																  </div>
													<!--  table close -->	



													
	</div>	
	</br> 	</br> 	</br>
	<h5><center><u> Repair Payment Fee</u> <h5> </center>
	</br></br>
			<table  align="left" style='font-size: 14px;' cellspacing="10">
														
																		<tr>		
																		  <td>Name  Of the Vendor
																		  </br></td>
																		  <td> :- </br>  </td>
																		  <td><?php echo "  " ;echo $displayName ;  ?> </br>  </td>
																		  
																		</tr>
																	 
																	  <tbody>
																	  
																	<tr>		
																		  <td>Currency Code</td>
																		   <td>:-</td>
																		<td>LKR</td>
																	</tr>
																																																			<tr>		
																		  <td>Amount</td>
																		   <td>:-</td>
																		
																			<td>Rs. <?Php echo number_format ("$cost_quatation", 2); ?></td>
																		  
																	</tr>
																	




																	</tbody>
																	</table>
	
	   </div>
	   	</br></br>
<div align="right"	>  
..........................................	</br>
Authorized Signature 
</div>


  </div>
	

	
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Sierra | IT Department 2019</small>
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
 </div>  </div>
</body>

</html>

 <?php 
        
    }
         
    else{
        header("location:index.php");
    }
         
    ?>  
  



	

