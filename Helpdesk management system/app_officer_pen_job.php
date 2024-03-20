<?php
include('dbconfig.php');
//check whether user login with session 
if (isset($_SESSION['userType'])and $_SESSION['userType']=="A" ) 
{  


// check before user type session
			if (isset($_SESSION['userType']))
			        {
					$userType=$_SESSION['userType'];
		            }
				  else
				     {
					 $userType="";
			         }    
  

//check before Display Name session
    	if (isset($_SESSION['displayName'])) 
		{
		$displayName=$_SESSION['displayName'];
		}
            else
			{
                $displayName="";
            }            
             
//check before title session
    	if (isset($_SESSION['title'])) 
		{		
			$title=$_SESSION['title'];		
		}

        else{
             $title="";
            }
            
            
//check before pic  session
    	if (isset($_SESSION['pic'])) 
		{
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
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pending Jobs / Approved Officer Pending Jobs </li>
								<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
      </ol>

	  
	  
  
	  
	      <center>

					<?php
//// submit from job_info_app_officer.php
												if (isset($_POST['submit_app'])) {
													
													$job_no= $_POST['job_no'];
													$remark= $_POST['remark'];
													$user=$_SESSION['userName'];

												date_default_timezone_set("Asia/colombo");
												$today= date("Y-m-d H:i:s");
													
													
													
													
												/// Payment Approved Status
														if($_POST['action'] == '5'  )
													
															{
															
																$job_status=$_POST['action'];
														
																$sql_update0="UPDATE tbl_jobs SET job_status='$job_status' where job_no='$job_no'";	
												 
																$sql_update00="UPDATE tbl_repair_head SET  approved_user='$user',approved_status_code='$job_status',appoved_reject_remark='$remark' , approved_reject_date='$today'  where job_no='$job_no'";				
																

																mysqli_query($conn,$sql_update00) ;
																mysqli_query($conn,$sql_update0) ;
														
																echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Succesfully Approved Job NO :- ".$job_no."  </b>  </span> </center></br>  </br>";
															}
													
													
												/// Perment Cancel Status
														if($_POST['action'] == '6'  )
													
															{
																$job_status=$_POST['action'];
														
																$sql_update0="UPDATE tbl_jobs SET job_status='$job_status' where job_no='$job_no'";	
												 
																$sql_update00="UPDATE tbl_repair_head SET  approved_user='$user',approved_status_code='$job_status',appoved_reject_remark='$remark' , approved_reject_date='$today'  where job_no='$job_no'";				
																
																$del_quataion="DELETE FROM tbl_repair_details WHERE rapair_no=(SELECT rapair_no FROM tbl_repair_head WHERE job_no='$job_no')";
																

																mysqli_query($conn,$sql_update00) ;
																mysqli_query($conn,$sql_update0) ;
																mysqli_query($conn,$del_quataion) ;
														
																echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Succesfully Perment Cancel Job NO :- ".$job_no."  </b>  </span> </center></br>  </br>";
															

															}
															
												/// Discard Status
														if($_POST['action'] == '9'  )
													
															{
																$job_status=$_POST['action'];
														
																$sql_update0="UPDATE tbl_jobs SET job_status='$job_status' where job_no='$job_no'";	
												 
																$sql_update00="UPDATE tbl_repair_head SET  approved_user='$user',approved_status_code='$job_status',appoved_reject_remark='$remark' , approved_reject_date='$today'  where job_no='$job_no'";				
																
																$del_quataion="DELETE FROM tbl_repair_details WHERE rapair_no=(SELECT rapair_no FROM tbl_repair_head WHERE job_no='$job_no')";

																mysqli_query($conn,$sql_update00) ;
																mysqli_query($conn,$sql_update0) ;
																mysqli_query($conn,$del_quataion) ;
														
																echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Succesfully Discard"."  </b>  </span> </center></br>  </br>";
															

															}

														}
//// end submit
					$sql1 ="SELECT *
							FROM tbl_jobs a, tbl_users b ,tbl_faults c,tbl_department d ,tbl_location l, tbl_equipments_type e,tbl_job_deatails s
							WHERE
							a.report_at = b.user_code AND
							a.dept_code=d.dept_code and
							a.loc_code=l.loc_code and 
							a.fault_reqt=c.fault_code and 
							a.item=e.equipments_type_code and
							a.job_no=s.job_no
							and  job_status='4'";

					
					$result2= mysqli_query($conn,$sql1);

					if ($result2->num_rows > 0) {
						echo"<center>";
						echo '<table class="table table-hover table-condensed" >';
						echo "<th> Job No </th> <th> Location</th> <th> Department</th> <th> User Name</th> <th>Job log Date</th><th> </th>";
						
						while ($row = $result2->fetch_assoc()){
							
						echo "<tr>";
						echo "<td>" . $row['job_no'] ." </td>	 
								<td>". $row['loc_name']. "</td>							   
								<td>". $row['dept_name']."</td>	
								<td style='width: 20%;'>".   $row['title'] .". ".  $row['f_name'] ." ". $row['l_name'] ."</td>	
								<td>". $row['date_enter']."</td>";
						
					  $jobno=$row['job_no'];
                      $req_user=$row['disp_name'];					  
					  $loc_name=$row['loc_name'];
					  $dept_name=$row['dept_name'];
				      $cont_no=$row['cont_no'];					  
				      $equipment_id=$row['equipment_id'];
					  $it_comment=$row['it_comment'];
					  $ven_inform_date=$row['vendor_info_date'];
					  $it_officer_code=$row['it_officer_code'];

				
					 ?>
					<form   enctype="multipart/form-data" action="job_info_app_officer.php" method="post" >
					<?php  	 echo "<input   class='form-control' name='job_no' value='" . $jobno . "' type='hidden'  >"; ?>					
					<?php  	 echo "<input   class='form-control' name='req_user' value='" . $req_user . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='loc_name' value='" . $loc_name . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='dept_name' value='" . $dept_name . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='cont_no' value='" . $cont_no . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='equipment_id' value='" . $equipment_id . "' type='hidden'  >"; ?>
	             	<?php  	 echo "<input   class='form-control' name='it_comment' value='" . $it_comment . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='ven_inform_date' value='" . $ven_inform_date . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='it_officer_code' value='" . $it_officer_code . "' type='hidden'  >"; ?>
					 <?php
						echo "<td>". "<button id='prebutton' type='submit'  class='btn-success'>view detail</button>"."</td>";
						
					 ?>
					
					
					</form>	
					<?php
						
						
						echo "</tr>";
						}

						echo "</table>";


						echo"</center>";


					} else {
						echo "<center>No any Pending Jobs Found</center>";  
					}
						   

					   
					   
					?>
             </center>      
            
			
	
   
   
   
   
   
   
   
	   
	  <!-- body -->    

    <div class="card-body"  >

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
              <span aria-hidden="true">�</span>
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
  





	
	




	   
	      
    
















