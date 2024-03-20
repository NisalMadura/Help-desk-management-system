<?php
include('dbconfig.php');

//check whether user login with session 
if (isset($_SESSION['userType'])) {


// check before user type session
			if (isset($_SESSION['userType'])) {
		
		
					$userType=$_SESSION['userType'];
			
						}
				else{
					$userType="";
			}    
  

// select user inventry or other inventry
if (isset($_POST['yesno'])) 
			{
			if($_POST['yesno']=="yesCheck")

				{		
					$userID=$_POST['userID'];
					$_SESSION['report_at']= $userID;
					$report_at_id=$_SESSION['report_at'];

										$sql_report="SELECT * FROM tbl_users where user_code=$report_at_id";
					$select_report_at_id=mysqli_query($conn,$sql_report);
					while ($row = $select_report_at_id->fetch_assoc()){
					$_SESSION['report_at_name']= $row['disp_name'];		
					$_SESSION['report_at']= $row['user_code'];	
					}
					
				}
			else if($_POST['yesno']=="noCheck"){
					$report_at_id=$_SESSION['userName'];  
					$sql_report="SELECT * FROM tbl_users where user_code=$report_at_id";
					$select_report_at_id=mysqli_query($conn,$sql_report);
					while ($row = $select_report_at_id->fetch_assoc()){
					$_SESSION['report_at_name']= $row['disp_name'];		
					$_SESSION['report_at']= $row['user_code'];	
					}

					
				}    

		}
// check direct vendor only
if ($_SESSION['userType']=="V") { 
			$report_at_id=$_SESSION['userName']; 
					$sql_report="SELECT * FROM tbl_users where user_code=$report_at_id";
					$select_report_at_id=mysqli_query($conn,$sql_report);
					while ($row = $select_report_at_id->fetch_assoc()){
					$_SESSION['report_at_name']= $row['disp_name'];		
					$_SESSION['report_at']= $row['user_code'];	
					}


			
				}    

	 



//view the department option list (select from database)
//select option department discription
$sql_select_department= "SELECT * FROM `tbl_department`";
$department_rst=mysqli_query($conn,$sql_select_department);	

//view the location option list(select from database)
$sql_select_location= "SELECT * FROM `tbl_location`";
$location_rst=mysqli_query($conn,$sql_select_location);              

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
        <li class="breadcrumb-item active"></li>
				<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
		</div>
      </ol>
		  

	<div class="row">
	 <!-- other all dashboard deatails-->
	
				
			  <div class="col-8">
<!-- --------------------------- ------------------>	
			  	<div>
				<!-- Icon Cards-->
					  <div class="row justify-content-center">
						<div class="col-xl-4 col-sm-6 mb-3" <?php if($userType=="U") 
																{ ?>
																style="display:none";>  
														<?php 
																}			
															else { ?>	style="display:block";>   
															<?php 	}    ?>
						  <div class="card text-white bg-primary o-hidden h-100">
							<div class="card-body">
							  <div class="card-body-icon">
								<i class="fa fa-fw fa-comments"></i>
								
							  </div>
							  <div class="mr-5">
							  			  <?php
										//it officer penidng jobs
										  if($userType=="O"){
											$rep_id=$_SESSION['report_at'];
											$sql1 ="SELECT job_no
											FROM tbl_jobs a, tbl_users b ,tbl_faults c,tbl_department d ,tbl_location l, tbl_equipments_type e
											WHERE
											a.report_at = b.user_code AND
											a.dept_code=d.dept_code and
											a.loc_code=l.loc_code and 
											a.fault_reqt=c.fault_code and 
											a.item=e.equipments_type_code and 
											a.it_officer_code='$rep_id'
											and  job_status='2'";

								
											//$result4= mysqli_query($conn,$sql1);
											//$rowcount=mysqli_num_rows($result4);				
											echo $rowcount." New Tickets!";
											  }
										  
										 // Help deks officer
										  else if($userType=="H"){
											  	$sql1 ="SELECT job_no,title,f_name,l_name, date_enter , fault_description
												FROM tbl_jobs a, tbl_users b ,tbl_faults c
												WHERE
												a.report_at = b.user_code and a.fault_reqt=c.fault_code
												and  job_status='1'";
											$result4= mysqli_query($conn,$sql1);
											$rowcount=mysqli_num_rows($result4);				
											echo $rowcount." New Tickets!";
										  
										  }
										  //approval officer
										  else if($userType=="A"){
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
											$result4= mysqli_query($conn,$sql1);
											$rowcount=mysqli_num_rows($result4);				
											echo $rowcount." New Tickets!";
                                            

										   }
										   
										 // vendor
										
										   else if($userType=="V"){
											    $rep_id=$_SESSION['report_at'];
											$sql1 ="SELECT *
											FROM tbl_jobs a, tbl_users b ,tbl_faults c,tbl_department d ,tbl_location l, tbl_equipments_type e,tbl_job_deatails s
											WHERE
											a.report_at = b.user_code AND
											a.dept_code=d.dept_code and
											a.loc_code=l.loc_code and 
											a.fault_reqt=c.fault_code and 
											a.item=e.equipments_type_code and
											a.job_no=s.job_no
											and  job_status='3'
											and s.vendor_code='$rep_id'";
											$result4= mysqli_query($conn,$sql1);
											$rowcount=mysqli_num_rows($result4);				
											echo $rowcount." New Tickets!";
										   }
										   
														
										?>
										  </div>
								</div>
								<!-- ---------------------------card footer start ------------------>	
								<?php 
								  if($userType=="O"){  ?>
								  <a class="card-footer text-white clearfix small z-1" href="itOfficer_pen_job.php" >
								  <?php 
								  }
								  else if($userType=="V"){ 	?>
									<a class="card-footer text-white clearfix small z-1" href="vendor_pen_job.php" >
								  <?php 
								   }
								  else if($userType=="A"){ 	?>
									  <a class="card-footer text-white clearfix small z-1" href="app_officer_pen_job.php" >
								  <?php 
								  }
								  else if($userType=="H"){ 	?>
								  <a class="card-footer text-white clearfix small z-1" href="admin_Pen_Job.php" >
								  <?php 
								  }
								
								?>
						        <!-- --------------------------- card footer End------------------>	

							  <span class="float-left">View Details</span>
							  <span class="float-right">
								<i class="fa fa-angle-right"></i>
							  </span>
							</a>
						  </div>
						</div>
						
						
						
						<div class="col-xl-4 col-sm-6 mb-3"<?php if($userType=="V" OR $userType=="O" ) 
																{ ?>
																style="display:block";>  
														<?php 
																}			
															else { ?>	style="display:none";>   
															<?php 	}    ?>
						  <div class="card text-white bg-warning o-hidden h-100">
							<div class="card-body">
							  <div class="card-body-icon">
								<i class="fa fa-fw fa-list"></i>
							  </div>
							  <div class="mr-5">
							   <?php
										//it officer comlete penidng jobs
										  if($userType=="O"){
											$rep_id=$_SESSION['report_at'];
											$sql1 ="SELECT *
												FROM tbl_jobs a, tbl_users b ,tbl_faults c,tbl_department d ,tbl_location l, tbl_equipments_type e,tbl_job_deatails s,tbl_repair_head r
												WHERE
												r.approved_user = b.user_code AND
												a.dept_code=d.dept_code and
												a.loc_code=l.loc_code and 
												a.fault_reqt=c.fault_code and 
												a.item=e.equipments_type_code and
												a.job_no=s.job_no and
												a.job_no=r.job_no and
												a.it_officer_code='$rep_id'
												and  job_status='7'";

								
											$result4= mysqli_query($conn,$sql1);
											$rowcount=mysqli_num_rows($result4);				
											echo $rowcount." Pending Complete!";
											  }
											  
											//it Vendor comlete penidng jobs
									else if($userType=="V"){
											    $rep_id=$_SESSION['report_at'];
												$sql1 ="SELECT *
												FROM tbl_jobs a, tbl_users b ,tbl_faults c,tbl_department d ,tbl_location l, tbl_equipments_type e,tbl_repair_head r,tbl_job_deatails s
												WHERE
												r.approved_user = b.user_code AND
												a.dept_code=d.dept_code and
												a.loc_code=l.loc_code and 
												a.fault_reqt=c.fault_code and 
												a.item=e.equipments_type_code and
												a.job_no=s.job_no and
												a.job_no=r.job_no
												and  job_status='5'
												and  s.vendor_code='$rep_id'";	
											
											$result4= mysqli_query($conn,$sql1);
											$rowcount=mysqli_num_rows($result4);				
											echo $rowcount." Pending Complete";
											  }	
																				
							  ?>
							  
							  
							 </div>
							</div>
							
							<?php

							//it Vendor complete penidng jobs details							
								  if($userType=="O"){  ?>
								  <a class="card-footer text-white clearfix small z-1" href="itOfficer_pen_com.php" >
								  <?php 
								  }
								  else if($userType=="V"){ 	?>
									<a class="card-footer text-white clearfix small z-1" href="vendor_pen_com.php" >
								  <?php 
								   }
									
									?>
							  <span class="float-left">View Details</span>
							  <span class="float-right">
								<i class="fa fa-angle-right"></i>
							  </span>
							</a>
						  </div>
						</div>
						
						<div class="col-xl-4 col-sm-6 mb-3"<?php if($userType=="U") 
																{ ?>
																style="display:none";>  
														<?php 
																}			
															else { ?>	style="display:block";>   
															<?php 	}    ?>
						  <div class="card text-white bg-success o-hidden h-100">
							<div class="card-body">
							  <div class="card-body-icon">
								<i class="fa fa-fw fa-thumbs-o-up"></i>
							  </div>
							  <div class="mr-5">
							   <?php
										//it officer penidng jobs
										  if($userType=="H"){
											$rep_id=$_SESSION['report_at'];
											$sql2 ="SELECT * FROM tbl_jobs WHERE job_status='8' and assign_H_user='$rep_id'";
											$result2= mysqli_query($conn,$sql2);
											$rowcount2=mysqli_num_rows($result2);				
											echo $rowcount2." Completed Jobs";
											  }
										  
										 // Help deks officer
										  else if($userType=="O"){
											$rep_id=$_SESSION['report_at'];
											$sql2 ="SELECT * FROM tbl_jobs WHERE job_status='8' and it_officer_code='$rep_id'";
											$result2= mysqli_query($conn,$sql2);
											$rowcount2=mysqli_num_rows($result2);				
											echo $rowcount2." Completed Jobs";
										  
										  }
										  //approval officer
										  else if($userType=="A"){
												$rep_id=$_SESSION['report_at'];
											$sql2 ="SELECT * FROM tbl_jobs j, tbl_repair_head r
											WHERE 
											j.job_status='8' and 
											j.job_no=r.job_no AND
											r.approved_user='$rep_id'";
											$result2= mysqli_query($conn,$sql2);
											$rowcount2=mysqli_num_rows($result2);				
											echo $rowcount2." Completed Jobs";
										   }
										   
										 // venddor
										
										   else if($userType=="V"){
											$rep_id=$_SESSION['report_at'];
											$sql2 ="SELECT * FROM tbl_jobs j, tbl_job_deatails s
											WHERE 
											j.job_status='8' and 
											j.job_no=s.job_no and
											s.vendor_code='$rep_id'";
											$result2= mysqli_query($conn,$sql2);
											$rowcount2=mysqli_num_rows($result2);				
											echo $rowcount2." Completed Jobs";
										   }
										   
														
										?>
										</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="#">
							  <span class="float-left"></span>
							  <span class="float-right">
							
							  </span>
							</a>
						  </div>
						</div>
	
				
					  </div>
					 </div>
				<!-- End Icon Cards-->
	<!-- --------------------------- ----------------   -->					
  <!-- Area Chart Example-->	
	<?php
						// Helpdsk officer(H) And Approval Officer (A) chart	
								if($userType=="A" or $userType=="H")
								{

					echo "
										<div>
				    
							  
								<div class='card-header'>
								  <i class='fa fa-area-chart'></i> ALL THE JOB STATUS</div>
								<div class='card-body'>
								      <div id='piechart' style='width: 800px; height: 300px;'></div>  
								</div>

					</div>
  <!--  End Area Chart Example-->	
	<!-- --------------------------- ----------------   -->		
				<div>
					<div class='row'>
						<div class='col-lg-12'>
					<!-- Example Bar Chart Card-->
							<div class='card mb-12'>
								<div class='card-header'>
									<i class='fa fa-bar-chart'></i>TOTAL JOB COUNT BY MONTH WISE</div>					
									<div class=''>
									  <canvas id='chartjs_bar' width='200' height='100'></canvas>
									</div> 
									<div class='card-footer small text-muted'></div>
							</div>
						</div>
					";		
								}
			else {
			echo "
										<div>
				   								<div class='card-body'>
								    
								</div>

					</div>
  <!--  End Area Chart Example-->	
	<!-- --------------------------- ----------------   -->		
				<div>
					<div class='row'>
						<div class='col-lg-12'>
					<!-- Example Bar Chart Card-->
							<div class='card mb-12'>
										
									<div >
								</div> 
								
							</div>
							</br></br><center>
							 <img src='images/welcome.png' /> </center>
							
							
					
						</div>
					";		
								}
					
								?>

			   
					<!-- End Example Bar Chart Card-->
		

					</div>
	  
				</div>
	<!-- --------------------------- ----------------   -->	
			</div>
	 <!-- END other all dashboard deatails-->

	 <!-- News feed-->
				  <div  class="col-4">
						<div class="card mb-3">
							<div class="card-header">
							  <i class="fa fa-bell-o"></i> News Feed</div>
							<div class="list-group list-group-flush small">
							<?php
						// Helpdsk officer(H) And Approval Officer (A)(search All Jobs)		
								if($userType=="A" or $userType=="H" or $userType=="O" )
								{
									$sql_feeds="SELECT * FROM tbl_jobs J,tbl_job_status S,tbl_users u WHERE
												j.report_at=u.user_code and 
												J.job_status= S.job_status_id and 
												J.job_no ORDER BY `J`.`job_no` DESC limit 20";
												
									$result_news= mysqli_query($conn,$sql_feeds);
										if ($result_news->num_rows > 0) {
											while ($row = $result_news->fetch_assoc()){
											//echo $row['job_no'] . $row['job_status_desc']."</br>";    
											echo "							  
											<a class='list-group-item list-group-item-action' href='#'>
											<div class='media'>
											<img class='d-flex mr-3 rounded-circle' alt=''>
											<div class='media-body'>".
											"<b>JOB NO :-".$row['job_no'] ." </b>is ". $row['job_status_desc']."
											</div>
											</div>
											</a>";
											
											}
											} 
										else {
											echo "<center>No Results Found</center>";  
											}
							
								}
								
								else if ($userType=="U")
								{
										 $report_at_id=$_SESSION['report_at'];	
										$sql_feeds="SELECT * FROM tbl_jobs J,tbl_job_status S,tbl_users u, tbl_faults f WHERE
										j.report_at='$report_at_id' and 
										j.report_at=u.user_code and 
										j.fault_reqt=f.fault_code and
										J.job_status= S.job_status_id 
										ORDER BY `J`.`job_no` DESC limit 20";
												
									$result_news= mysqli_query($conn,$sql_feeds);
										if ($result_news->num_rows > 0) {
											while ($row = $result_news->fetch_assoc()){
											//echo $row['job_no'] . $row['job_status_desc']."</br>";    
											echo "							  
											<a class='list-group-item list-group-item-action' href='#'>
											<div class='media'>
											<img class='d-flex mr-3 rounded-circle' alt=''>   
											<div class='media-body'>".
											"<b>JOB NO :-".$row['job_no'] ." </b> ". $row['equipment_id']."=". $row['fault_description']."
											</div>
											</div>
											</a>";																						}
											} 
										else {
											echo "<center>No Results Found</center>";  
											}	
								}
							
							// vendor
							
									else if ($userType=="V")
											{
											  $report_at_id=$_SESSION['report_at'];	
											  
											$sql1 = "SELECT * FROM tbl_jobs J, tbl_job_deatails d,tbl_job_status S WHERE
												d.job_no=j.job_no and
												d.vendor_code='$report_at_id'and
												J.job_status= S.job_status_id 
												ORDER BY `J`.`job_no` DESC limit 10";
											 
											 $result2= mysqli_query($conn,$sql1);	


										if ($result2->num_rows > 0) {
										echo"<center>";
										echo '<table class="table table-hover table-condensed" style="width:500px;">';
										 echo "<th> Pay Code </th> <th> Job Status </th> ";
										while ($row = $result2->fetch_assoc()){
											

										  echo "<tr>";
										   echo "<td>" . $row['job_no'] ."  </td> <td>". $row['job_status_desc'] ." </td>";	     


												echo "</tr>";
										}

										echo "</table>";


										echo"</center>";
											} else {
													echo "<center>No Results Found</center>";  
												}

														 
											} 
							?>
								 
							</div>
							
						</div>
				  </div>
	 <!-- End News feed-->
	 
	 
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
	<?php  
//Pie chart
 $connect = mysqli_connect("localhost", "root", "", "db_helpdesk");  
 $query = "SELECT job_status_desc Job_Status ,count(*) Count FROM tbl_jobs J,tbl_job_status S,tbl_users u, tbl_faults f WHERE j.report_at=u.user_code and J.job_status= S.job_status_id and  j.fault_reqt=f.fault_code 
and j.job_status IN (1,2,3,4,5,6,7,8) GROUP BY job_status_desc;";  
 $result = mysqli_query($connect, $query); 
 ?>  
  
  
        <script type="text/javascript" src="http://localhost:8888/helpdesk/vendor/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Job_Status', 'Count'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Job_Status"]."', ".$row["Count"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
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

<?php
//BAR chart
$con  = mysqli_connect("localhost","root","","db_helpdesk");
 if (!$con) {
   
   # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT date_enter,CONCAT(MONTHNAME(date_enter),'-',YEAR(date_enter))as 'Month Name', count(*) Count FROM tbl_jobs J,tbl_job_status S,tbl_users u, tbl_faults f WHERE j.report_at=u.user_code and J.job_status= S.job_status_id and j.fault_reqt=f.fault_code and j.job_status IN (1,2,3,4,5,6,7,8) GROUP BY MONTHNAME(date_enter) ORDER BY `J`.`date_enter` ASC";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['Month Name']  ;
            $sales[] = $row['Count'];
        }
 
 
 }
 
 
?>
 <script src="vendor/charts/jquery-1.9.1.js"></script>
  <script src="vendor/charts/Chart.min.js"></script>

<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
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
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
	
	document.getElementById('valid_msg').innerHTML="file";
        document.getElementById("img").value = '';
        return false;
		
		
    }

	
	
	
	
    if (file.size > 1024000) {
      
document.getElementById('valid_msg').innerHTML="size";
        document.getElementById("img").value = '';
        return false;
    }
		else
	{
	document.getElementById('valid_msg').innerHTML="elakiri";
	
	
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
    <script src="js/sb-admin-charts.js"></script>
  </div>
  

</body>

</html>
        <?php 
        
    }
         
    else{
        header("location:index.php");
    }
         
    ?>