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
<!-- 

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>
    <link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" /> -->
	
	
	   <script src="vendor/pdf/jquery.min.js"></script>
  <script src="vendor/pdf/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/pdf/1jquery.min.js"></script>
    <script src="vendor/pdf/jquery-ui.js" type="text/javascript"></script>
    <link href="vendor/pdf/jquery-ui.css" rel="stylesheet" type="text/css" />
   
	
   
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
        <li class="breadcrumb-item active">Pending Jobs / Approved Officer Pending Jobs</li>
		
		
 <!-- -----------------------------------------Report user not login user----------------------------------------------- -->		
			<div align="right">
		 		<?php
					echo $_SESSION['report_at_name'];	
				?>
			</div>
      </ol>
 <!-- ------------------------------------------------------------------------------------------------------- -->
   

  <!-- -----------------------vendor_pending page info--------------------------------------- -->
   
			   <?Php
				 $job_no = $_POST['job_no'];
				 $req_user=$_POST['req_user'];
				 $loc_name=$_POST['loc_name'];
				 $dept_name=$_POST['dept_name'];
				 $cont_no=$_POST['cont_no'];
				 $equipment_id=$_POST['equipment_id'];
				 $it_comment=$_POST['it_comment'];
				$it_officer_code=$_POST['it_officer_code'];

				
//// Get the Equipment Deatails	
		
							$ab=substr($equipment_id,0,3);

								if($ab=='CPU'){

										$sql1 = "SELECT CONCAT(brand_descrip,'--',comp_type)AS equipment ,descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code,date_purchase
													FROM 
													tbl_equipments e, tbl_brand b, tbl_cpu c,tbl_proc_type t,tbl_vendor v
													WHERE 
													e.cpu_no='$equipment_id' and
													e.brand_code=b.brand_code AND
													e.cpu_no=c.cpu_no and
													e.vendor_code=v.vendor_code and
													c.proc_type=t.proc_type";
												}
			
								else if($ab=='MON'){
										$sql1 = "SELECT CONCAT(brand_descrip,'--',size)AS equipment,mon_color as descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code,date_purchase
													FROM 
													tbl_equipments e, tbl_brand b,tbl_monitor m,tbl_vendor v
													WHERE 
													e.mon_no='$equipment_id' and
													e.mon_no=m.mon_no and
													e.vendor_code=v.vendor_code and
													e.brand_code=b.brand_code";
						
						
												}

								else if($ab=='UPS'){
										$sql1 = "SELECT CONCAT(brand_descrip,'--',size)AS equipment,descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code,date_purchase
													FROM 
													tbl_equipments e, tbl_brand b,tbl_ups u,tbl_ups_model m,tbl_vendor v
													WHERE 
													e.ups_no='$equipment_id' and
													e.ups_no=u.ups_no and
													e.vendor_code=v.vendor_code and
													e.brand_code=b.brand_code AND
													u.model_code=m.ups_model_no";
									
									
												}

								else if($ab=='SCA'){
										$sql1 = "SELECT CONCAT(brand_descrip,'--',scN_type)AS equipment,scn_color as descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code,date_purchase
													FROM 
													tbl_equipments e, tbl_brand b,tbl_scaner s,tbl_vendor v
													WHERE 
													e.scn_no='$equipment_id' and
													e.scn_no=s.scn_no and
													e.vendor_code=v.vendor_code and
													e.brand_code=b.brand_code";
									
									
												}
								else {
												$sql1 = "select * from tbl_equipments where pc_type='$equipment_id'";
											}

	$result2= mysqli_query($conn,$sql1);

				if ($result2->num_rows > 0) {



				while ($row = $result2->fetch_assoc()){
						
					$expiry_date=$row['w_expiry_date'];
					$purchase_date=$row['date_purchase'];
					$vendor_name=$row['vendor_name'];
					$date_purchase=$row['date_purchase'];
					

					//date('Y-m-d', strtotime('+5 years'));
					$datenow= date("Y-m-d");	

/////quipment Id
				$eqip_id	= $row['equipment'] ."-".$row['descrip'];
					
				$date = date_create($expiry_date);  
				date_add($date, date_interval_create_from_date_string('2 years'));  
				$agree_exp= date_format($date, 'Y-m-d'); 


/////  Agreement Type
														if($ab=='CPU'){
														
														
																		if($expiry_date>$datenow ){
																			

																			$agreement=  "<b><span style=' font-size: 13px; color:Green' ; >In Warranty </span></b>";
																			$agree="In Warranty";
																			
															

																		}

																		else if ($expiry_date<$datenow and $expiry_date>$agree_exp){
																			
														
																			$agreement= "<b><span style='font-size: 13px; color:Yellow'; >Agreement</b>";
																			$agree="Agreement";			
																			
														
																		 }
																		else
																		{
															
																			 $agreement= "<b><span  style='font-size: 13px; color:Red'; >Agreement is Expired</span></b>";
																			 $agree="Agreement is Expired";	
																				
																		}
																			
														
														
														
																	}

													else if($ab=='MON')

													{
														
																		if($expiry_date>$datenow ){
																			

																			 $agreement=  "<b><span style=' font-size: 13px; color:Green'; > In Warranty</b>";
																			 $agree="In Warranty";
																			 
																		}

																		else if ($expiry_date<$datenow and $expiry_date>$agree_exp){

																			  $agreement=  "<b><span style='font-size: 13px; color:Yellow'; > Agreement</b>";
																			  $agree="Agreement";
																			
																		 }
																		else
																		{
															
																			  $agreement=  "<b><span style='font-size: 13px; color:Red'; > Agreement is Expired</b>";
																			  $agree="Agreement is Expired";
																		}
																			
														
													}

													else if($ab=='UPS')
													{
																			if($expiry_date>$datenow ){
																			

																		$agreement=  "<td><b><span style=' font-size: 13px; color:Green'; > In Warranty</b></td>";
																		$agree="In Warranty";


																		}
																		else
																							{

																			  $agreement= "<b><span style='font-size: 13px; color:Red'; > Warranty is Expired</b>";
																			  $agree="Warranty is Expired";
																							
																		
																		}
																		
														
													}

													else if($ab=='SCA')
													{
																			if($expiry_date>$datenow ){

																			$agreement=  "<b><span style=' font-size: 13px; color:Green'; > In Warranty</b>";
																			$agree="In Warranty";


																		}
																		else
																							{

																		$agreement=  "<td><b><span style='font-size: 13px; color:Red'; > Warranty is Expired</b></td>";
																		$agree="Warranty is Expired";
														
																		
																		}


													}
													else if($ab=='PRI')
													{
																			if($expiry_date>$datenow ){

																		$agreement= "<b><span style=' font-size: 13px; color:Green'; > In Warranty</b>";
																		$agree="In Warranty";

																		}
																		else
																							{

																		$agreement=  "<b><span style='font-size: 13px; color:Red'; > Warranty is Expired</b>";
																		$agree="Warranty is Expired";
														
																		}


													}

													///// end Agreement Type	
	
	
	
	
	
			
													} 	
													
													
											} 	
								else {
										echo "<center>No Results Found</center>";  
									}
	
///  Get the Equipment Deatails	End		
			
			
//cost calculate
			
	$sql_cost = "SELECT * FROM tbl_repair_head WHERE job_no='$job_no'";	
		$result3= mysqli_query($conn,$sql_cost);

				while ($row_cost = $result3->fetch_assoc()){
						
					$cost_quatation=$row_cost['total_cost'];		
				}
		
//end cost 		
				?>
				
	<form   enctype="multipart/form-data"  action="app_officer_pen_job.php"   method="post"  >
    <div class="form">
      <div class="form-row">
		  <div class="col-5">
					<ol class="breadcrumb">
								 <center><B>JOB INFORMATION</B> </center>
								 <table    bgcolor="#AED6F1  "  width ='405px;'style=' border-collapse:separate;border-spacing:2 15px; font-size: 12px; border-radius: 20px; '>
										 <tr>	<td><b>JOB NO</b></td>	<td>:-</td>	<td><?Php echo $job_no; ?> </td>  </tr>
										 <tr>	<td><b>USER NAME</b></td>	<td>:-</td>	<td><?Php echo  $req_user; ?></td>  </tr>
										 <tr>	<td><b>LOCATION</b></td>	<td>:-</td>	<td><?Php echo  $loc_name; ?></td>  </tr>
										 <tr>	<td><b>DEPARTMENT</b></td>	<td>:-</td>	<td><?Php echo  $dept_name; ?></td>  </tr>
										 <tr>	<td><b>ITEM</b></td>	<td>:-</td>	<td><?Php echo  $eqip_id; ?></td>  </tr>
										 <tr>	<td><b>FAULT (IT OFFICER COMMENT)</b></td>	<td>:-</td>	<td><?Php echo  $it_comment; ?></td>  </tr>	
										 <tr>	<td><b>VENDOR NAME</b></td>	<td>:-</td>	<td><?Php echo  $vendor_name; ?></td>  </tr>			 
										 <tr>	<td><b>DATE OF PERCHASE </b></td>	<td>:-</td>	<td><span id="assign"><?Php echo  $date_purchase; ?> </span></td>  </tr>
										 <tr>	<td><b>AGE ANALYSIS</b></td>	<td>:-</td>	<td><?Php 
									    	$today = date("Y-m-d");
											$diff = date_diff(date_create($date_purchase), date_create($today));
											echo $diff->format('Years:- %Y Months:- %M Days-: %D');
										  ?> 
											</td>  </tr>
										 <tr>	<td><b>WARRANTY TYPE</b></td>	<td>:-</td>	<td><?Php echo $agreement; ?></td>  </tr>
										 <tr>	<td><b>VENDOR COST</b></td>	<td>:-</td>	<td>Rs. <?Php echo number_format ("$cost_quatation", 2); ?> </td>  </tr>
										 
							 	 </table>				
										<center>			
											<input id="btnShow" class="btn-danger"type="button" value="View Quatation" />
											<input id="rep"  class="btn-danger"type="button" value="View Repair History"  onclick=" repaire();" />		
										</center>					 
					</ol>
			</div>
			
	
			
			
			
	<div class="col-7">
	
	
							<!-- quatation-->

							<script type="text/javascript">
								$(function () {
									
										var abc=document.getElementById("sss").value;
										var bd=".pdf";
									var fileName =abc+bd ;
									$("#btnShow").click(function () {
										$("#dialog").dialog({
											modal: true,
											title: fileName,
											width: 540,
											height: 450,
											buttons: {
												Close: function () {
													$(this).dialog('close');
												}
											},
											open: function () {
												var object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"500px\" height=\"300px\">";
												object += "If you are unable to view file, you can download from <a href=\"{FileName}\">here</a>";
												object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
												object += "</object>";
												object = object.replace(/{FileName}/g, "upload/" + fileName);
												$("#dialog").html(object);
											}
										});
									});
								});
							</script>

							
							
							<div id="dialog" style="display: none">
							</div>
						 <!-- quatation close-->

				<input name="job_no" id='sss' value="<?php echo $job_no;  ?>" type='hidden'>

				
				
						<center>
							<B>ACTION</B> 
							</br> </br>    	
							<div onclick="action();">
								
									<input type="radio" name="action"  id="" value="5" required>
									<label>Approve</label> &nbsp;  &nbsp; 
									
									<input type="radio"    name="action" id="" value="6" required>
									<label>Reject</label> &nbsp; &nbsp; 								
									
									<input type="radio"   name="action" id="" value="9" required>
									<label>Discard</label> &nbsp;&nbsp;  									
									</div>
						  
							</center>
<!-- Remarks text eare display none or block-->	
								<script>
								function action()
								{
								var text2 = document.getElementById("remark");
									text2.style.display = "block";
								}

								</script>
<!-- END repair history and tex box hide-->	


							<div id="remark" style="display:none">
							<label  style='font-size: 12px;'><b>REMARKS*</b></label>
							<textarea class="form-control"  name="remark" required ></textarea>
							</div>
							</br> 
                          <center>  <button type="submit" name="submit_app" class="btn btn-primary"onclick="return checkVali();"   >Confim </button> </center>
	
<!-- repair history and tex box hide-->
	
									   <style>
												#div-to-toggle{
													border: 1px solid Black;
													padding: 15px 15px 15px 15px;
													margin: 20px auto;
													width: 105  %;
													background:#feffc9;
													overflow: visible;
													box-shadow: 3px 3px 8px #555;
													position: relative;
												}
												#close-btn{
													position: absolute;
													background: #000;
													border: 2px solid #999;
													color:#fff ;
													border-radius: 12px;
													height:25px;
													width:25px;
													padding: 1px;
													top: -10px;
													right: -10px;
													box-shadow: 2px 2px 10px #555;
													font-weight: bold;
													cursor: pointer;
												}
									   
											</style>
										<div id="repaire"  style="display: none;">
												<div id="div-to-toggle" style="display: block;">
												<input id="close-btn" type="button" value="X"  onclick=" close_btn();" />
						<?php 
					//Repair history table from mysql tables
								$sql_repair="SELECT * FROM tbl_jobs j, tbl_repair_head h WHERE 
								j.job_no=h.job_no and
								j.equipment_id='$equipment_id' and
								(h.approved_status_code<>9 AND h.approved_status_code<>6)";
								//echo $equipment_id;
								$Repair_results = mysqli_query($conn,$sql_repair);

									if ($Repair_results->num_rows > 0) {	
												
						?>						
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
																			
																			echo "<td>"."Rs. ". number_format ($rowrep['total_cost'], 2)."</td>";
																			
																		echo "</tr>";		
															
																		}
															?>			
																		
																	  </tbody>
																	</table>
																  </div>
													<!--  table close -->
							<?php 
																} else {
										echo "<center>No Repair History Found</center>";
									}
													
							?>				
													
													
												</div>
									   </div>
									   
									 <script>  
									   
									   function repaire() {

										var text = document.getElementById("repaire");
										text.style.display = "block";

												}

										function close_btn(){
										var text2 = document.getElementById("repaire");
										text2.style.display = "none";
											
										}		
												
												
												
									</script>
   
   
   

	    <!-- close repair history and tex box hide-->
   
   
   
   
   
   </div>	
				
</div>
				  

</div>

 </form>
			   

	  <!-- body -->    

    <div class="card-body"  >

	
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
      <!--   meka dammoth quatation en naha <script src="vendor/jquery/jquery.min.js"></script> -->
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
  


