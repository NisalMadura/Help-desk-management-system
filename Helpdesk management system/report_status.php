<?php
$to = $_GET["folioNo"];
$from= $_GET["certNo"];
$status1= $_GET["status"];

$to1=$to." 23:59:59";
$from1=$from." 00:00:00";

include('dbconfig.php');

// select list from mysql tbl_job_status table


	if($status1=="0")
		{
		$sql = "SELECT * FROM tbl_jobs J,tbl_job_status S,tbl_users u, tbl_faults f WHERE j.report_at=u.user_code and J.job_status= S.job_status_id and  j.fault_reqt=f.fault_code 
		and j.job_status IN (1,2,3,4,5,6,7,8) and j.end_datetime between
		'$from1' and '$to1';"; 


		//BETWEEN  '$from' AND '$to';";
		
		$status_report="All the Job Status";
	// date_enter	
		
		}
	else
		{
		$sql = "SELECT * FROM tbl_jobs J,tbl_job_status S,tbl_users u,tbl_faults f  WHERE j.report_at=u.user_code and J.job_status= S.job_status_id
		and j.job_status ='$status1' and j.fault_reqt=f.fault_code and j.date_enter BETWEEN  '$from1' AND '$to1';";
		
						$sql_select= "SELECT job_status_desc FROM tbl_job_status WHERE job_status_id='$status1'";
						$select_rst=mysqli_query($conn,$sql_select);
							$row1=mysqli_fetch_array($select_rst);
							 $status_report= $row1[0] ;
		
		
		}

$results= mysqli_query($conn,$sql);
	if ($results->num_rows > 0)
			{
?>
				<!--  table -->
				
				
				
				
<div id="content">
<button class="btn-success" style="float: right;" onclick="javascript:window.print()"><span class="fa fa-fw fa-print"></span> Print Report</button>	
</br></br>
	<center> 
	
						</br>
						<img src="images/sierradash.png" class="" style=" width: 25%; 	 z-index :1;  " />	
			</br> </br>
						<H5>
						<?php 	echo $status_report." 	</H5> <b>From :- </b> ".$from." <b>To :- </b> ".$to; 
						?>
								
			
					</center>
						
					</br> 
														<div class="table-responsive">
																	<table class="table table-bordered"  style='font-size: 12px;'id="dataTable"  cellspacing="0">
																	  <thead>
																		<tr>		
																		  <th>JOB NO</th>
																		  <th>COMPLETE DATE</th>
																		  <th>LOG USER</th>
																		  <th>FAULT DESCRIPTION</th>
																		  <th>JOB STATUS</th>
																		  
														  
																		</tr>
																	  </thead>
																	  <tbody>
															<?php 	  
															while ($rowrep =$results->fetch_assoc()){												
																		echo "<tr>";
																			echo "<td>". $rowrep['job_no']  ."</td>";
																			echo "<td>". $rowrep['end_datetime']  ."</td>";
																			echo "<td>". $rowrep['disp_name']  ."</td>";
																			echo "<td>". $rowrep['fault_description']."</td>";
																			echo "<td>". $rowrep['job_status_desc']  ."</td>";
																		
																			
																		echo "</tr>";		
															
																		}
															?>			
																		
																	  </tbody>
																	</table>
																  </div>
													<!--  table close -->		
	</div>	
	
    <style>
	
	#hide{
	display: none;
	}
	
		#hide1{
	display: none;
	}
	
	</style>
	
	
	
	
<?php
			}
	else 
		{
	 echo '</br> </br> </br><center>'."NO Results Found" .'</center>';

		}


?>
