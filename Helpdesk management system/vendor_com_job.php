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
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pending Jobs / Vendor</li>
		
		
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
				$ven_inform_date=$_POST['ven_inform_date'];
				
				$app_date=$_POST['app_date'];
				$app_rem=$_POST['app_rem'];
				$app_officer=$_POST['app_officer'];
				
				//

				
//// Get the Equipment Deatails	
		
							$ab=substr($equipment_id,0,3);

								if($ab=='CPU'){

										$sql1 = "SELECT CONCAT(brand_descrip,'--',comp_type)AS equipment ,descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
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
										$sql1 = "SELECT CONCAT(brand_descrip,'--',size)AS equipment,mon_color as descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
													FROM 
													tbl_equipments e, tbl_brand b,tbl_monitor m,tbl_vendor v
													WHERE 
													e.mon_no='$equipment_id' and
													e.mon_no=m.mon_no and
													e.vendor_code=v.vendor_code and
													e.brand_code=b.brand_code";
						
						
												}

								else if($ab=='UPS'){
										$sql1 = "SELECT CONCAT(brand_descrip,'--',size)AS equipment,descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
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
										$sql1 = "SELECT CONCAT(brand_descrip,'--',scN_type)AS equipment,scn_color as descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
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
					$vendor_code1=$row['vendor_code'];

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


				
//// End the It_officer Name And Con_no

			
				
				   
				?>
				
	<form   enctype="multipart/form-data" id="insert_form" action="vendor_payment.php"   method="post"  >
    <div class="form">
      <div class="form-row">
		  <div class="col-5.5">
					<ol class="breadcrumb">
								 <center><B>JOB INFORMATION</B> </center>
								 <table    bgcolor="#AED6F1  "  width ='450px;'style=' border-collapse:separate;border-spacing:2 15px; font-size: 12px; border-radius: 20px; '>
										 <tr>	<td><b>JOB NO</b></td>	<td>:-</td>	<td><?Php echo  $job_no; ?></td>  </tr>
										 <tr>	<td><b>USER NAME</b></td>	<td>:-</td>	<td><?Php echo  $req_user; ?></td>  </tr>
										 <tr>	<td><b>LOCATION</b></td>	<td>:-</td>	<td><?Php echo  $loc_name; ?></td>  </tr>
										 <tr>	<td><b>DEPARTMENT</b></td>	<td>:-</td>	<td><?Php echo  $dept_name; ?></td>  </tr>
										 <tr>	<td><b>CONTACT NO</b></td>	<td>:-</td>	<td><?Php echo  $cont_no; ?></td>  </tr>
										 <tr>	<td><b>ITEM</b></td>	<td>:-</td>	<td><?Php echo  $eqip_id; ?></td>  </tr>
										 <tr>	<td><b>FAULT(IT OFFICER COMMENT)</b></td>	<td>:-</td>	<td><?Php echo  $it_comment; ?></td>  </tr>										 
										 <tr>	<td><b>JOB INFORMED DATE</b></td>	<td>:-</td>	<td><?Php echo  $ven_inform_date; ?> </td>  </tr>
										 <tr>	<td><b>WARRANTY TYPE</b></td>	<td>:-</td>	<td><?Php echo $agreement; ?></td>  </tr>
										 <tr>	<td><b>APPROVED OFFICER</b></td>	<td>:-</td>	<td><?Php echo  $app_officer; ?></td>  </tr>
										 <tr>	<td><b>APPROVED OFFICER REMARKS</b></td>	<td>:-</td>	<td><?Php echo  $app_rem; ?></td>  </tr>
										 <tr>	<td><b>APPROVED DATE</b></td>	<td>:-</td>	<td><span id="assign"><?Php echo $app_date; ?></span></td>  </tr>
										 
							 	 </table>							 
					</ol>
			</div>
			
	
			
			
			
	<div class="col-6">
	<input name="job_no" id='sss' value="<?php echo $job_no;  ?>" type='hidden'>

	
	
			<center><B>ACTION</B> 	
				</br>	
				 </br>  

				
				</center>	
	
			
							<center>	
										<table    bgcolor="#AED6F1  "  style=' border-collapse:separate;border-spacing:10 15px; font-size: 14px; border-radius: 25px; '>
										<tr>	<td><b>ACTION TAKEN</b></td>	<td>:-</td>	
										 <td> <textarea class="form-control"  id="dis1" name="dis1" ></textarea> </td>  </tr>																															
										 <tr>	<td><b>Complete Date</b></td>	<td>:-</td>	<td><input name="ven_com_fin" id="ven_fin_date" type='datetime-local' onchange="return completed()">
										 </br><b>	<span id="complete_date" style='font-size: 12px; color:red;'> </span> </b> </td>  </tr>
										 <tr>	<td><b>Vendor Reference </b></td>	<td>:-</td>	<td><input name="ven_ref_co" id="ven_ref_co" type='text'></td>  </tr>
									
										 
								 </table> 
							</center>	
  

    </br>   
	<center> <button type="submit" name="submit4" class="btn btn-primary"onclick="return checkVali();"   >Confim </button> </center>
   
 		<script>	
// validation
		function checkVali()
			{
				if(document.getElementById("dis1").value=="")
					{
					alert("plz Enter Action Taken");
						return false;	
					}
				var com_fin =document.getElementById("ven_fin_date").value ;
				var com_F_date = new Date(com_fin);

				var todaysDate = new Date();
			
				var assign_date1 =document.getElementById("assign").innerHTML ;
				var assign_date2 = new Date(assign_date1);
					if(com_fin=="")
						{
						//document.getElementById("start_date").innerHTML="plz select Finish date" ;
							alert("plz select Complete date" );
							return false;
						}
					if(assign_date2>com_F_date)	
						{
							//document.getElementById("start_date").innerHTML="Can't Enter After Date for complete date" ;
							//alert("Can't Enter After Date for complete date");
							return false;
								
						}	
						
												
					if(todaysDate<com_F_date)
						{
				//	document.getElementById("start_date").innerHTML="Can't Enter Earlier date" ;
						//	alert("Can't ");
							return false;
						}
				// vendor referance
			
				if(document.getElementById("ven_ref_co").value=="")
					{
					alert("plz Enter Vendor Reference");
					return false;	
					}
				
			}
		
	
		</script>  
   	<script>  
   function completed()
	{					
	
				var com_fin =document.getElementById("ven_fin_date").value ;
				var com_F_date = new Date(com_fin);

				var todaysDate = new Date();
			
				var assign_date1 =document.getElementById("assign").innerHTML ;
				var assign_date2 = new Date(assign_date1);		
							
							
							if(com_fin=="")
						{
						document.getElementById("complete_date").innerHTML="plz select complete date" ;
							alert("plz select Finish date" );
							return false;
						}


				if(assign_date2>com_F_date)	
						{
							document.getElementById("complete_date").innerHTML="Can't Enter Earlier date" ;
							//alert("Can't Enter After Date for complete date");
							return false;
								
						}	
						
												
					if(todaysDate<com_F_date)
						{
				document.getElementById("complete_date").innerHTML="Can't Enter Future date" ;
						//	alert("Can't ");
							return false;
						}
				
						
					else {
				   document.getElementById("complete_date").innerHTML="" ;
					}



						
	}
	</script>
   
   
   
   
   
   
   
   
   
   
   
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
  



	

