<?php
$q = $_GET["q"];
include('dbconfig.php');



			if (isset($_SESSION['userType'])) {
		
		
					$userType=$_SESSION['userType'];
			
						}
				else{
					$userType="";
			}    

			
			
///////////////////////////////////////////////////////////////////////////////////
	
// Helpdsk officer(H) And Approval Officer (A)(search All Jobs)		
if($userType=="A" or $userType=="H" or $userType=="O" )
						{


							$sql1 = "SELECT  * FROM tbl_jobs J,tbl_job_status S,tbl_users u
							WHERE 
							j.report_at=u.user_code and
							J.job_status= S.job_status_id and
							J.job_no like '$q%'";	
											
				$result2= mysqli_query($conn,$sql1);	


				if ($result2->num_rows > 0) {
				echo"<center>";
				echo '<table class="table table-hover table-condensed" style="width:500px;">';
				 echo "<th> Pay Code </th> <th> Job Status </th> <th> User Name </th>";
				while ($row = $result2->fetch_assoc()){
					

				  echo "<tr>";
				   echo "<td>" . $row['job_no'] ."  </td> <td>". $row['job_status_desc'] ." </td>	<td>". $row['disp_name'] ." </td>";	     


						echo "</tr>";
				}

				echo "</table>";


				echo"</center>";
					} else {
							echo "<center>No Results Found</center>";  
						}

						
					}	


// User search Job

else if ($userType=="U")
					{
					  $report_at_id=$_SESSION['report_at'];	
					  
					$sql1 = "SELECT  * FROM tbl_jobs J,tbl_job_status S,tbl_users u
					WHERE 
					j.report_at='$report_at_id' and
					j.report_at=u.user_code and
					J.job_status= S.job_status_id and
					 J.job_no like '$q%'";
					 
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
