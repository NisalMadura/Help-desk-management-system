<?php
$q = $_GET["q"];
include('dbconfig.php');
$sql_repair="SELECT * FROM tbl_jobs j, tbl_repair_head h WHERE 
								j.job_no=h.job_no and
								j.equipment_id='$q' and
								(h.approved_status_code<>9 AND h.approved_status_code<>6)";
								//echo $equipment_id;
$Repair_results = mysqli_query($conn,$sql_repair);

	
									if ($Repair_results->num_rows > 0) {	
												
						?>						
			<center> 			
					</br>
						<img src="images/sierradash.png" class="" style=" width: 25%; 	 z-index :1;  " />	
			</br> 
						<H5>
						<?php 	echo " Details of Repair History </H5> "; 
							echo "<b>Equipment ID :- </b>  ".$q; 
						?>
								
			
					</center>
					<button class="btn-success" style="float: right;" onclick="javascript:window.print()"><span class="fa fa-fw fa-print"></span> Print Report</button>									
								
								
								
								
								
								
								
								
								<!--  table -->
														<div class="table-responsive">
																	<table class="table table-bordered"  style='font-size: 12px;'id="dataTable"  cellspacing="0">
																	  <thead>
																		<tr>		
																		  <th>JOB NO</th>
																		  <th>DATE</th>
																		  <th>FAULT DESCRIPTION</th>
																		  <th>COST</th>
														  
																		</tr>
																	  </thead>
																	  <tbody>
															<?php 	  
															while ($rowrep = $Repair_results->fetch_assoc()){												
																		echo "<tr>";
																			echo "<td>". $rowrep['job_no']  ."</td>";
																			echo "<td>". $rowrep['date_enter']  ."</td>";
																			echo "<td>". $rowrep['fault_description']  ."</td>";
																			echo "<td>"."Rs ".number_format($rowrep['total_cost'], 2)."</td>";
																			
																		echo "</tr>";		
															
																		}
															?>			
																		
																	  </tbody>
																	</table>
																  </div>
													<!--  table close -->
														   
													   <style>
													
													#mainPage{
													display: none;
													}
													
														#hide1{
													display: none;
													}
													
													</style>
	 
	
	
													
													
							<?php 
																} else {
										echo "<center>No Repair History Found</center>";
									}
													
							?>				
													
											
												</div>





