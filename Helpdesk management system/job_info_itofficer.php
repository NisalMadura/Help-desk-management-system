<?php
include('dbconfig.php');
//check whether user login with session 
if (isset($_SESSION['userType'])and $_SESSION['userType']=="O" ) {  


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
        <li class="breadcrumb-item active">Pending Jobs / IT Officer</li>
		
		
 <!-- -----------------------------------------Report user not login user----------------------------------------------- -->		
			<div align="right">
		 		<?php
					echo $_SESSION['report_at_name'];	
				?>
			</div>
      </ol>
 <!-- ------------------------------------------------------------------------------------------------------- -->
   

  <!-- -----------------------Job_info_it_officer page info--------------------------------------- -->
   
			   <?Php
				$job_no = $_POST['job_no'];
				$req_user=$_POST['req_user'];
				$loc_name=$_POST['loc_name'];
				$dept_name=$_POST['dept_name'];
				$equipment_descrip=$_POST['equipment_descrip'];
				$fault_descrip=$_POST['fault_descrip'];
				$other_reqt=$_POST['other_reqt'];
				$assign_date=$_POST['assign_date'];
				$cont_no=$_POST['cont_no'];
				$report_at = $_POST['report_at'];		   
				?>
				
	<form   enctype="multipart/form-data" action="itOfficer_pen_job.php"   method="post"  >
    <div class="form">
      <div class="form-row">
		  <div class="col-4">
					 <ol class="breadcrumb">
								 <center><B>JOB INFORMATION</B> </center>
								 <table    bgcolor="#AED6F1  "  width ='320px;'style=' border-collapse:separate;border-spacing:2 15px; font-size: 14px; border-radius: 20px; '>
										 <tr>	<td><b>JOB NO</b></td>	<td>:-</td>	<td><?Php echo  $job_no; ?></td>  </tr>
										 <tr>	<td><b>USER NAME</b></td>	<td>:-</td>	<td><?Php echo  $req_user; ?></td>  </tr>
										 <tr>	<td><b>LOCATION</b></td>	<td>:-</td>	<td><?Php echo  $loc_name; ?></td>  </tr>
										 <tr>	<td><b>DEPARTMENT</b></td>	<td>:-</td>	<td><?Php echo  $dept_name; ?></td>  </tr>
										 <tr>	<td><b>CONTACT NO</b></td>	<td>:-</td>	<td><?Php echo  $cont_no; ?></td>  </tr>
										 <tr>	<td><b>ITEM</b></td>	<td>:-</td>	<td><?Php echo  $equipment_descrip; ?></td>  </tr>
										 <tr>	<td><b>FAULT</b></td>	<td>:-</td>	<td><?Php echo  $fault_descrip; ?></td>  </tr>
										 <tr>	<td><b>FAULT DESCRIPTION</b></td>	<td>:-</td>	<td><?Php echo  $other_reqt; ?></td>  </tr>
										 <tr>	<td><b>JOB ASSIGN DATE</b></td>	<td>:-</td>	<td><span id="assign"><?Php echo  $assign_date; ?></span></td>  </tr>
							 
								 </table>
								 
						</ol>
			</div>
			
		<div class="col-md-3.8">
		
			<center><B>IT OFFICER COMMENTS</B> 
				</br>
				</br>					
				<label>INVENTORY</label>
					<input type="radio" name="faults" id="I" value="I" onclick="myFunction2()" required>

				<label>OTHER</label>
					<input type="radio" name="faults" id="O" value="O" onclick="myFunction()" required>

					
				<span id="text2" style="display:none">						
					<?php
					// select the equipment_type and there name from tbl_equipments
						$sql_equip = "SELECT 
									CONCAT(
									 IF(LEFT(cpu_no, 3) ='CPU' and pc_type='LAP','LAPTOP','') ,
									 IF(LEFT(cpu_no, 3) ='CPU' and pc_type='DES','DESKTOP COMPUTER','') ,
									 IF(LEFT(cpu_no, 3) ='CPU' and pc_type='SER','SERVER COMPUTER','') ,
									 IF(LEFT(mon_no, 3) ='MON','MONITOR',''),
									 IF(LEFT(prn_no, 3) ='PRI','PRINTR','') ,
									 IF(LEFT(ups_no, 3) ='UPS','UPS','') ,
									 IF(LEFT(scn_no, 3) ='SCA','SCANNER',''),' :-- ',prn_no, cpu_no,mon_no,scn_no,ups_no ) AS abc,
						 
									CONCAT(prn_no, cpu_no,mon_no,scn_no,ups_no) AS VALUE,w_expiry_date
						 
									FROM  tbl_equipments WHERE
									user_code='$report_at'  ;";
										
									$result_equip= mysqli_query($conn,$sql_equip);
						//style=" height: 40px;
				
					?>
					
<script type="text/javascript">
function showData() {
          // equi_search 
                
                var s = document.getElementById('invent_select');
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
	            xmlhttp.open("GET", "equi_search.php?q=" + s.value, true);
	            xmlhttp.send(); 
                }
	    }
				
</script>	

						<select name="invent_selected" id="invent_select"  class="form-control" style='font-size: 13px;  height: 38px; width:250px;' onchange="showData()" Required>
									<option   value=""> SELECT INVENTORY ITEM  </option>
									<?php 	while($row_equip=mysqli_fetch_array($result_equip)):;			 ?>
									<option value ="<?php  	echo $row_equip[1] ;			 ?>"> <?php  	echo $row_equip[0] ;			 ?> </option>
									<?php  	endwhile;	?>                                                                                                       
						</select>  

					
						
								<center><span id="txtData" style=""><b></span></center>
						
				</span>

					<span id="text" style="display:none">
								<?php
								//view the fault option list(select from database)
								$sql_faults= "SELECT * FROM `tbl_faults`";
								$faults_rst=mysqli_query($conn,$sql_faults);
								?>
				
										<select name="fault_selected" id="fault_select"  class="form-control" style='font-size: 13px;  height: 38px; width:250px;'Required>
										<option  value=""> SELECT OTHER FAULTS</option>
										<?php 	while($rowFault =mysqli_fetch_array($faults_rst)):;			 ?>
										<option value ="<?php  	echo $rowFault[0] ;			 ?>"> <?php  	echo $rowFault[1] ;			 ?> </option>
										<?php  	endwhile;	?>	                                                                                                             
                                                        
										</select>  
				
				
				
				
					</span>
					<input name="job_no" id='sss' value="<?php echo $job_no;  ?>" type='hidden'>

				</br>
				<label>IT OFFICER COMMENT</label>
				 <textarea class="form-control"  id="it_o_comment" name="it_comment" ></textarea> 
			
					</br>
				<center><B>ACTION</B> 
		
					</br>
					</br>				
				<label>COMPLETE</label>
				

				
				<input type="radio" name="vendor" id="complete" value="8" onclick="myFunction3()" required>
									<label>INFORM TO VENDOR</label>
				<input type="radio"   name="vendor" id="inform" value="3" onclick="myFunction4()"required>

				
				
				
							
	</center>



<script>
//Radio box validation (show and hide)

function myFunction() {
  var checkBox = document.getElementById("O");
  var text = document.getElementById("text");
  var text2 = document.getElementById("text2");
  if (checkBox.checked == true){
	  	text2.style.display = "none";
		document.getElementById("invent_select").disabled = true; 
    text.style.display = "block";
	document.getElementById("fault_select").disabled = false; 
	

  } else {
   text.style.display = "none";
	 document.getElementById("fault_select").disabled = true; 
  }
}
//
function myFunction2() {
  var checkBox = document.getElementById("I");
  var text = document.getElementById("text");
  var text2 = document.getElementById("text2");
  if (checkBox.checked == true){
    text.style.display = "none";
	document.getElementById("fault_select").disabled = true; 
	text2.style.display = "block";
	document.getElementById("invent_select").disabled = false; 
  } else {
    text2.style.display = "none";
 document.getElementById("invent_select").disabled = true; 
  }
}


// select the complete radio
function myFunction3() {
  var checkBox = document.getElementById("complete");
  var text3 = document.getElementById("text3");
  var text4 = document.getElementById("text4");
  if (checkBox.checked == true){
    text3.style.display = "block";
	text4.style.display = "none";
// anable com_ items
	 document.getElementById("com_start_date").disabled = false; 
	 document.getElementById("fin_start_date").disabled = false;
	 document.getElementById("site_support").disabled = false; 
	 document.getElementById("call_support").disabled = false; 
	 document.getElementById("remote_access_support").disabled = false; 
	 document.getElementById("dis1").disabled = false;
// disable ve_ items
	// document.getElementById("ven_start_date").disabled = true; 
	 document.getElementById("ven_site_support").disabled = true; 
	 document.getElementById("ven_call_support").disabled = true; 
	 document.getElementById("ven_remote_access_support").disabled = true; 
	 document.getElementById("ven_dis1").disabled = true;
	
  } else {
     text3.style.display = "none";
	 	// disable com_ items
	// document.getElementById("com_start_date").disabled = true; 
	// document.getElementById("fin_start_date").disabled = true;
	// document.getElementById("site_support").disabled = true; 
	// document.getElementById("call_support").disabled = true; 
	// document.getElementById("remote_access_support").disabled = true; 
	// document.getElementById("dis1").disabled = true;
  }
}

// select the inform vendor radio

function myFunction4() {
  var checkBox = document.getElementById("inform");
  var text3 = document.getElementById("text3");
  var text4 = document.getElementById("text4");
  if (checkBox.checked == true){
    text4.style.display = "block";
	text3.style.display = "none";
	
		 // anable ve_ items
	// document.getElementById("ven_start_date").disabled = false; 
	 document.getElementById("ven_site_support").disabled = false; 
	 document.getElementById("ven_call_support").disabled = false; 
	 document.getElementById("ven_remote_access_support").disabled = false; 
	 document.getElementById("ven_dis1").disabled = false;
	
	
	
	
	// disable com_ items
	 document.getElementById("com_start_date").disabled = true; 
	 document.getElementById("fin_start_date").disabled = true;
	 document.getElementById("site_support").disabled = true; 
	 document.getElementById("call_support").disabled = true; 
	 document.getElementById("remote_access_support").disabled = true; 
	 document.getElementById("dis1").disabled = true;
  } else {
     text4.style.display = "none";
	 
	 // disable ve_ items
	// document.getElementById("ven_start_date").disabled = true; 
	 //document.getElementById("ven_site_support").disabled = true; 
	// document.getElementById("ven_call_support").disabled = true; 
	// document.getElementById("ven_remote_access_support").disabled = true; 
	// document.getElementById("ven_dis1").disabled = true; 
	 
  }
}


</script>



<script> 
/// form validation(job info_itofficer_validation

function checkVali()
	{


		var inventory =document.getElementById("I");
		var other =document.getElementById("O");
		
		
//check the select inventory or other 

	if (inventory.checked == false && other.checked == false)
		{
			alert("Select Inventory or Faults" );
			return false;	
		
		}
	
	
// when inventory item selected	
	if (inventory.checked == true )

		{
		
			if(document.getElementById("invent_select").value=="")
				{
					alert("plz select Inventory Item");
					return false;	
				}
		}
	
// when other item selected	
	if (other.checked == true )

		{
			if(document.getElementById("fault_select").value=="")
				{
					alert("plz select Faults");
					return false;	
				}	
		
		}	
	

//check IT OFFICER COMMENT	
	if(document.getElementById("it_o_comment").value=="")
		{
				alert("plz Enter IT Officer Comment");
					return false;	
		}	


		
		
//////////////////////////////

		var complete =document.getElementById("complete");
		var inform =document.getElementById("inform");		
		
// select complete 
	

	if (complete.checked == true )

		{

	
			var com_star =document.getElementById("com_start_date").value;
			var com_S_date = new Date(com_star);
			
			var com_fin =document.getElementById("com_fin_date").value ;
			var com_F_date = new Date(com_fin);

			
			var todaysDate = new Date();
			
			var assign_date1 =document.getElementById("assign").innerHTML ;
			var assign_date2 = new Date(assign_date1);
	

			//date validation			
				if(com_star=="")
						{
						    document.getElementById("start_date").innerHTML="Plz Enter Start Date" ;
						//	alert("plz select Start date" );
							return false;
						}
						
				if(assign_date2>com_S_date)	
				{
							//alert("Plz Enter Earlier Date for Job Assign date");
							return false;
					
					
				}
						
				if (todaysDate<com_S_date)
						{
						//	alert("Can't Enter Future date for -Finish Date-");
							return false;
						}
		
				if(com_fin=="")
						{
						//	document.getElementById("complete_date").innerHTML="plz select Finish date" ;
					//alert("plz select Finish date" );
							return false;
						}


				if(com_S_date>com_F_date)
						{
		   				//	alert("Can't Enter Earlier date");
							return false;
						}
						if (todaysDate<com_F_date)
						{
						//alert("Can't Enter Future date for -Finish Date-");
							return false;
						}	
				
					
	//Support Type select	
		var remote =document.getElementById("remote_access_support");
		var site =document.getElementById("site_support");		
		var call =document.getElementById("call_support");			
					
					
		if (remote.checked == false && site.checked == false && call.checked == false)
				{
				alert("plz select support type" );
				return false;	
		
				}	

	//check ACTION TAKEN

		if(document.getElementById("dis1").value=="")
				{
					alert("plz Enter Action Taken");
					return false;	
				}
			

		}
////////////////////////		

/////////////////	
		
		
		
//select inform
	
	if (inform.checked == true )

		{
			//var com_star =document.getElementById("ven_start_date").value;
			//var com_S_date = new Date(com_star);
						
			//var todaysDate = new Date();
			
			//var assign_date1 =document.getElementById("assign").innerHTML ;
			//var assign_date2 = new Date(assign_date1);
			
			//date validation			
				// if(com_star=="")
						// {
						// document.getElementById("inform_msgs").innerHTML="plz select Start date" ;			
						// //	alert("plz select Start date" );
							// return false;
						// }			
						
				// if(assign_date2>com_S_date)	
				// {
							// //alert("Plz Enter Earlier Date for Job Assign date");
							// return false;
					
					
				// }
						
						
						
				// if (todaysDate<com_S_date)
						// {
						// //	alert("Can't Enter Future date for -Start Date and time-");
							// return false;
						// }						
						
	//Support Type select	
		var remote =document.getElementById("ven_remote_access_support");
		var site =document.getElementById("ven_site_support");		
		var call =document.getElementById("ven_call_support");			
					
					
		if (remote.checked == false && site.checked == false && call.checked == false)
				{
				alert("plz select support type" );
				return false;	
		
				}	

	//check ACTION TAKEN

		if(document.getElementById("ven_dis1").value=="")
				{
					alert("plz Enter Action Taken");
					return false;	
				}						

		}			
		

		   
}   
</script>	
			





</div>
			
			
			
			
	<div class="col-md-4.5">
   				</br>
				</br>
   <span id="text3" style="display:none">
   <script>
  //onchange Start date change validation of  complete job proccess
  function start()
		{	
			
			var com_star =document.getElementById("com_start_date").value;
			var com_S_date = new Date(com_star);
			
			var com_fin =document.getElementById("com_fin_date").value ;
			var com_F_date = new Date(com_fin);

			
			var todaysDate = new Date();
			
			var assign_date1 =document.getElementById("assign").innerHTML ;
			var assign_date2 = new Date(assign_date1);
	

			//date validation			
				if(com_star=="")
						{
							document.getElementById("start_date").innerHTML="Plz Enter Start Date" ;
							//alert("plz select Start date" );
							return false;
						}
						
				if(assign_date2>com_S_date)	
						{
							document.getElementById("start_date").innerHTML="Plz Enter Earlier Date for Job Assign date" ;
							//alert("Plz Enter Earlier Date for Job Assign date");
							return false;
								
						}
				if (todaysDate<com_S_date)
						{
							document.getElementById("start_date").innerHTML="Can't Enter Future date for -Finish Date-" ;
							//alert("Can't Enter Future date for -Finish Date and time-");
							return false;
						}
				else 	{
							document.getElementById("start_date").innerHTML="" ;
						}
	
		}

// onchange finish date validation

  function completed()
		{	
			var com_star =document.getElementById("com_start_date").value;
			var com_S_date = new Date(com_star);
			
			var com_fin =document.getElementById("com_fin_date").value ;
			var com_F_date = new Date(com_fin);

			
			var todaysDate = new Date();
			
			var assign_date1 =document.getElementById("assign").innerHTML ;
			var assign_date2 = new Date(assign_date1);
				if(com_fin=="")
						{
							
						document.getElementById("complete_date").innerHTML="plz select Finish date" ;
								//alert("plz select Finish date" );
							return false;
						}


				if(com_S_date>com_F_date)
						{
		
							document.getElementById("complete_date").innerHTML="Can't Enter Earlier date" ;
							//alert("Can't Enter Earlier date");
							return false;
						}

				if (todaysDate<com_F_date)
						{
					   	document.getElementById("complete_date").innerHTML="Can't Enter Future date for -Finish Date-" ;	
					//	alert("Can't Enter Future date for -Finish Date-");
							return false;
						}				

				else {
						document.getElementById("complete_date").innerHTML="" ;
					 }			
		}

		</script>

										<table    bgcolor="#AED6F1  "  style=' border-collapse:separate;border-spacing:10 15px; font-size: 14px; border-radius: 25px; '>
										 <tr>	<td><b>Start Date and time</b></td>	<td>:-</td>	<td><input  name="com_start" id="com_start_date" type='datetime-local' onchange="return start()"> </br> 
										 <b>	<span id="start_date" style='font-size: 12px; color:red;'> </span> </b> </td>  </tr>
										 <tr>	<td><b>Finish Date and time</b></td>	<td>:-</td>	<td><input name="com_fin" id="com_fin_date" type='datetime-local'onchange="return completed()">
										 </br><b>	<span id="complete_date" style='font-size: 12px; color:red;'> </span> </b> </td>  </tr>
										 <tr>	<td><b>Support Type</b></td>	<td>:-</td>	
										 <td><input type="radio" name="sup_type" value="s"  id="site_support"> Site Support </td>  </tr>	
										 <tr>	<td><b></b></td>	<td>:-</td>	
										 <td><input type="radio" name="sup_type" value="c" id="call_support"> Call Support</td>  </tr>
										 <tr>	<td><b></b></td>	<td>:-</td>	
										 <td><input type="radio" name="sup_type" value="r"  id="remote_access_support"> Remort Access Support</td>  </tr>								 
									 	<tr>	<td><b>ACTION TAKEN</b></td>	<td>:-</td>	
										 <td> <textarea class="form-control"  id="dis1" name="dis1" ></textarea> </td>  </tr>	
										  <tr>	<td><b></b></td>	<td></td>	
										 <td>	<button type="submit" name="submit1" class="btn btn-primary"onclick="return checkVali();"   >Confim </button></td>  </tr>
										 
								 </table> 
						
   </span>
    <span id="text4" style="display:none">

								       <table    bgcolor="#AED6F1  "  style=' border-collapse:separate;border-spacing:10 15px; font-size: 14px; border-radius: 25px; '>
									<!-- <tr>	<td><b>Start Date and time</b></td>	<td>:-</td>	
									 <td><input  name="com_start1" id="ven_start_date" type='datetime-local' onchange="return inform_vender()"> 
										</br><b>	<span id="inform_msgs" style='font-size: 12px; color:red;'></span> </b>	 </td> </tr>-->
										 <tr>	<td><b>Support Type</b></td>	<td>:-</td>	
										 <td><input type="radio" name="sup_type" value="s"  id="ven_site_support"> Site Support </td>  </tr>	
										 <tr>	<td><b></b></td>	<td>:-</td>	
										 <td><input type="radio" name="sup_type" value="c"  id="ven_call_support"> Call Support</td>  </tr>
										 <tr>	<td><b></b></td>	<td>:-</td>	
										 <td><input type="radio" name="sup_type" value="r"  id="ven_remote_access_support"> Remort Access Support</td>  </tr>								 
									 	<tr>	<td><b>ACTION TAKEN</b></td>	<td>:-</td>	
										 <td><textarea class="form-control"  id="ven_dis1" name="dis" ></textarea> </td>  </tr>	
										  <tr>	<td><b></b></td>	<td></td>	
										 <td>	<button type="submit" name="submit1" class="btn btn-primary"  onclick="return checkVali();"   >Confim </button></td>  </tr>
										 
								 </table> 
								 
<script>
// onchange Start date validation of inform vendor module
  // function inform_vender()
		// {	
			// var com_star =document.getElementById("ven_start_date").value;
			// var com_S_date = new Date(com_star);
						
			// var todaysDate = new Date();
			
			// var assign_date1 =document.getElementById("assign").innerHTML ;
			// var assign_date2 = new Date(assign_date1);
			
			// //date validation			
				// if(com_star=="")
						// {
							// document.getElementById("inform_msgs").innerHTML="plz select Start date" ;	
							// //alert("plz select Start date" );
							// return false;
						// }			
						
				// if(assign_date2>com_S_date)	
						// {
						// document.getElementById("inform_msgs").innerHTML="Plz Enter Earlier Date for Job Assign date" ;	
						// //alert("Plz Enter Earlier Date for Job Assign date");
							// return false;
									
						// }
				// if (todaysDate<com_S_date)
						// {
							// document.getElementById("inform_msgs").innerHTML="Can't Enter Future date for Start Date " ;	
						// //	alert("Can't Enter Future date for -Start Date and time-");
							// return false;
						// }						
				// else 	{
					// document.getElementById("inform_msgs").innerHTML="" ;	
						// }

	// }
</script>					 
						 
			</span>
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



