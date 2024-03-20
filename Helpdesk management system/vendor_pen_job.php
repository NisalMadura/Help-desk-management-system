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


			
 if (isset($_SESSION['userName'])) {
		
		
		$userName=$_SESSION['userName'];
		
		
		}

        else{
             $userName="";
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
								<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
      </ol>

	  
	  
<!-- --------------Submit complete and quation submit from job_info_vendor.php page---------------------------------------------- -->	  
	  
									<?php
								if (isset($_POST['submit1'])) {
									
									
									$expiry_date= $_POST['expiry_date'];
									$agreement= $_POST['agreement1'];
									$job_no= $_POST['job_no'];
									$vendor_code= $_POST['vendor_code'];
									
									
									
									
									/// Complete
										if($_POST['vendor'] == '7'  )
									
											{
											
											$action_taken=$_POST['dis1'];
											$ven_com_start=$_POST['ven_com_start'];
											$ven_com_fin=$_POST['ven_com_fin'];
											$ven_ref_co=$_POST['ven_ref_co'];
											$job_status=$_POST['vendor'];
										
								$sql_update0="UPDATE tbl_jobs SET job_status='$job_status' where job_no='$job_no'";	
								 
								$sql_update00="UPDATE tbl_job_deatails SET  vendor_reference='$ven_ref_co',vendor_code='$vendor_code',aggre_type='$agreement' , date_of_expiry='$expiry_date' ,vendor_at_date='$ven_com_start',ven_comment='$action_taken',vendor_co_date='$ven_com_fin' where job_no='$job_no'";				
												

										mysqli_query($conn,$sql_update00) ;
										mysqli_query($conn,$sql_update0) ;
										
										 echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Succesfully Complete Job NO :- ".$job_no."  </b>  </span> </center></br>  </br>";
									}
									
									
									/////// submit quatations
										if($_POST['vendor'] == '4'  )
									
											{
											$job_status=$_POST['vendor'];
											$ven_ref=$_POST['ven_ref'];	
											$ven_com_start=$_POST['atten_date'];			
											$action_taken=$_POST['dis'];
										
										
										
											
										$sql_update0="UPDATE tbl_jobs SET job_status='$job_status' where job_no='$job_no'";	
										mysqli_query($conn,$sql_update0) ;
										$sql_update1="UPDATE tbl_job_deatails SET  vendor_reference='$ven_ref',vendor_code='$vendor_code',aggre_type='$agreement' , date_of_expiry='$expiry_date' ,vendor_at_date='$ven_com_start',vendor_action='$action_taken' where job_no='$job_no'";				
										mysqli_query($conn,$sql_update1);
										
										// quatations upload
											$filename = $_FILES["file"]["name"];
											$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
											$file_ext = substr($filename, strripos($filename, '.')); // get file name

											//// Rename file
											$newfilename = $job_no. $file_ext;
											
											// file path
											$filepath= "upload/" . $newfilename;

											 move_uploaded_file($_FILES["file"]["tmp_name"],$filepath);
											// echo "File uploaded successfully.";		
										// end quatations
										
										//quotation_sub_date
												date_default_timezone_set("Asia/colombo");
												$quotation_sub_date= date("Y-m-d H:i:s");
										


									

								////////////////////////////////////////////////////////////////////	
									// insert tbl_repair_details////////
										
												if(isset($_POST["item_name"]))
												{
													
												$ab=$_POST["cost"];
												// $connect = new PDO("mysql:host=localhost;dbname=db_helpdesk", "root", "");
												 $order_id = uniqid();
												 for($count = 0; $count < count($_POST["item_name"]); $count++)
												 {  
												  $query = "INSERT INTO tbl_repair_details 
												  ( rapair_no,part_name, part_description, part_warranty,item_cost) 
												  VALUES ((select last_rep_no +1 FROM tbl_last_repno), :item, :item_desc, :warranty,:cost) ";
												  $statement = $connect->prepare($query);

												  $statement->execute(
												   array(
														
														 ':item'  => $_POST["item_name"][$count], 
														 ':item_desc' => $_POST["item_desc"][$count],
														':warranty' => $_POST["warrenty"][$count],
														':cost' => $_POST["cost"][$count]
														
												   )
												  );
												 }
												 $result = $statement->fetchAll();
												 if(isset($result))
												 {

												// sum of quTtion cost
												$sum_quatation=(array_sum($ab));

												 }
												}

								/////////////////// end tbl_repair_details 	//////////////
											
									//insert tbl_repair_head table and update last_rep_no table	
										
											//	$sql_insert="INSERT INTO tbl_repair_head (job_no, fault_description, quotation_path, total_cost, quotation_sub_date) VALUES ('$job_no','$action_taken','$filepath','','$quotation_sub_date')";
											$sql_insert="INSERT INTO tbl_repair_head (rapair_no,job_no, fault_description, quotation_path, total_cost,quotation_sub_date,receipt_no) VALUES ((select last_rep_no +1 FROM tbl_last_repno),'$job_no','$action_taken','$filepath',' $sum_quatation','$quotation_sub_date','$ven_ref')";
												mysqli_query($conn,$sql_insert);
											
									// update last_rep_no table
											
												$sql_update3="UPDATE tbl_last_repno SET last_rep_no=last_rep_no+1";
												mysqli_query($conn,$sql_update3) ;
											
											
										 echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Successfully Quotation Submitted... Job NO :- ".$job_no."  </b>  </span> </center></br>  </br>";		
											
													
											}
									
									
								}
								?>	  
									  

	  
<!-- --------------Submit complete and quation submit endddd---------------------------------------------- -->	 	  
	  
	  
	  
	  
	  
	  
	      <center>
					<?php
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
							and s.vendor_code='$userName'";

					
					$result2= mysqli_query($conn,$sql1);

					if ($result2->num_rows > 0) {
						echo"<center>";
						echo '<table class="table table-hover table-condensed" >';
						echo "<th> Job No </th> <th> Location</th> <th> Department</th> <th> Contact Person</th> <th>Contact No</th><th>Fault (IT Officer Comment)</th><th> </th>";
						
						while ($row = $result2->fetch_assoc()){
							
						echo "<tr>";
						echo "<td>" . $row['job_no'] ." </td>	 
								<td>". $row['loc_name']. "</td>							   
								<td>". $row['dept_name']."</td>	
								<td style='width: 20%;'>".   $row['title'] .". ".  $row['f_name'] ." ". $row['l_name'] ."</td>	
								<td>". $row['cont_no']."</td>	
								<td style='width: 25%;'>". $row['it_comment']."</td>";
						
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
					<form   enctype="multipart/form-data" action="job_Info_vendor.php" method="post" >
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
        $('#availability').html('<span class="text-danger">Username is already exist</span>');
        $('#register').attr("disabled", true);
       }
       else
       {
        $('#availability').html('<span class="text-success">Username is not Available</span>');
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

<script> 

function checkValidations()
{
   
            var f =document.getElementById("fristName").value ;
        if(f=="")
          {``
          document.getElementById("frist").innerHTML="Frist Name is empty";
          
          }  
        else
          document.getElementById("frist").innerHTML="";
    
    
    
       var l =document.getElementById("lastName").value ;
            
          if(l=="")
          {
          document.getElementById("last").innerHTML="Last Name is empty";
         
          }   
         else
          document.getElementById("last").innerHTML="";
    
    
    
    
        var dis =document.getElementById("displayName").value ;
            
          if(dis=="")
          {
          document.getElementById("dis").innerHTML="Display Name is empty";
         
          }   
         else
          document.getElementById("dis").innerHTML="";
      
      
    
          var em =document.getElementById("email").value ;
            
          if(em=="")
          {
          document.getElementById("emailmsg").innerHTML="Email is empty";
         
          }   
         else
          document.getElementById("emailmsg").innerHTML="";
    
    
    
    
           var us =document.getElementById("username").value ;
            
          if(us=="")
          {
          document.getElementById("usmsg").innerHTML="User Name is empty";
         
          }   
         else
          document.getElementById("usmsg").innerHTML="";
    
    
        var ab =document.getElementById("contactNo").value ;
        if(ab=="")
          {
          document.getElementById("conmsg").innerHTML="contact number is empty";
           
        }
         else if(isNaN(ab))
        {
          document.getElementById("conmsg").innerHTML="Enter valid contact number";
          return false ;
        } 
        
        else if(ab.length==10 && ab.charAt(0)==0 )  {
              document.getElementById("conmsg").innerHTML="";
          return true ;
        }
        
        else if(ab.length==12 && ab.charAt(0)=='+' )  {
            document.getElementById("conmsg").innerHTML="";
           return true ;
        }
        else{ 
          document.getElementById("conmsg").innerHTML="Enter valid contact number";
          return false ;
      }      
       
    
    
    
    
    
    
    
    
    
    
    
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
 var file1 = document.getElementById("img");
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();

    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
	document.getElementById("img").value = '';
	document.getElementById('valid_msg').innerHTML="Not a Valid file type";
       
        return false;
		
		
    }
    	

    if (file.size > 102400) {
        document.getElementById("img").value = '';
        document.getElementById('valid_msg').innerHTML="Reach Upload Maxsize 100KB";
        
        return false;
    }
		else
	{
	document.getElementById('valid_msg').innerHTML="";
	
	
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
  




	
	




	   
	      
    
















