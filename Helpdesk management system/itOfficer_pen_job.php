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
        <li class="breadcrumb-item active">Pending Jobs / IT Officer</li>
								<div align="right">
		 		<?php
		echo $_SESSION['report_at_name'];	

				?>
</div>
      </ol>

    <!-- --------------------- job complete and inform vendor info from job_info_itofficer.php--------------------------- -->
	<?php

//$job_no1 ="123";
if (isset($_POST['submit1'])) {

	if($_POST['faults'] == 'I'  )
				{
				$inv_other = $_POST['faults'];
				$invent_selected = $_POST['invent_selected'];
				$fault_selected ='';
				
				
				}
	else if ($_POST['faults'] == 'O'  )
				{
				$inv_other = $_POST['faults'];
				$fault_selected = $_POST['fault_selected'];					
				$invent_selected ='';
		
				}	



$it_comment = $_POST['it_comment'];
			
$sup_type = $_POST['sup_type'];

$job_no= $_POST['job_no'];

			





///////////////////////////////////////////////////////////			
				
		if($_POST['vendor'] == '8'){
			$com_start = $_POST['com_start'];
			$com_fin = $_POST['com_fin'];
			$job_status=$_POST['vendor'];
			$report_at_user=$_SESSION['report_at'] 	;	
			$action_taken = $_POST['dis1'];
			
			
$sql_update00="UPDATE tbl_jobs SET job_status='$job_status',inv_other='$inv_other',equipment_id='$invent_selected',itof_fault_selected='$fault_selected',it_comment='$it_comment',start_datetime='$com_start',support_type_code='$sup_type',end_datetime='$com_fin',complete_officer='$report_at_user',comp_comment='$action_taken'  where job_no='$job_no'";	
			
				
echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Succesfully Complete Job NO :- ".$job_no."  </b>  </span> </center></br>  </br>";
		
			}
///////////////////////////////////////////////////////////////	
				
	else if ($_POST['vendor'] == '3' )			
		{

		


				$job_status=$_POST['vendor'];
				date_default_timezone_set("Asia/colombo");
				$ven_inform_date= date("Y-m-d H:i:s");
			//	$com_start = $_POST['com_start1'];
				$com_start = date("Y-m-d H:i:s");
				$report_at_user=$_SESSION['report_at'];
				$action_taken = $_POST['dis'];
				
				$vendor_code4= $_POST['vendor_code2'];
				
					$sql_update00="UPDATE tbl_jobs SET job_status='$job_status',inv_other='$inv_other',equipment_id='$invent_selected',itof_fault_selected='$fault_selected',it_comment='$it_comment',start_datetime='$com_start',support_type_code='$sup_type',action='$action_taken'  where job_no='$job_no'";	
					
					$sql_insert="INSERT INTO tbl_job_deatails(job_no,vendor_code,vendor_info_date,vendor_info_user) VALUES ('$job_no','$vendor_code4','$ven_inform_date','$report_at_user')";
					mysqli_query($conn,$sql_insert) ;
					echo "<center> <span style='color:white;  background-color:blue;'> <b>"." Succesfully Inform Vendor--Job NO :- ".$job_no."  </b>  </span> </center></br>  </br>";
		
		}			

mysqli_query($conn,$sql_update00) ;



}
		
?>
	
	<!-- ----------- end------------------------------------------------------------------------------------------------- -->
	   

	      <center>
					<?php
					$rep_id=$_SESSION['report_at'];
					$sql1 ="SELECT *
							FROM tbl_jobs a, tbl_users b ,tbl_faults c,tbl_department d ,tbl_location l, tbl_equipments_type e
							WHERE
							a.report_at = b.user_code AND
							a.dept_code=d.dept_code and
							a.loc_code=l.loc_code and 
							a.fault_reqt=c.fault_code and 
							a.item=e.equipments_type_code and 
							a.it_officer_code='$rep_id'
							and  job_status='2'";

					
					$result2= mysqli_query($conn,$sql1);

					if ($result2->num_rows > 0) {
						echo"<center>";
						echo '<table class="table table-hover table-condensed" >';
						echo "<th> Job No </th> <th> Reported User</th> <th> Item</th> <th> Fault</th> <th>Fault Description</th><th> </th>";
						
						while ($row = $result2->fetch_assoc()){
							
						echo "<tr>";
						echo "	<td>" . $row['job_no'] ." </td>	
						<td>". $row['title'] ." ".  $row['f_name'] ." ". $row['l_name'] .".</td>							   
						<td>". $row['equipments_descrip']."</td>	
						<td>". $row['fault_description']."</td>			
						<td>". $row['other_reqt']."</td>";
						
					 $jobno=$row['job_no'];
					 $req_user=$row['disp_name'];
					 $loc_name=$row['loc_name'];
					 $dept_name=$row['dept_name'];
					 $equipment_descrip=$row['equipments_descrip'];
					 $fault_descrip=$row['fault_description'];
					 $other_reqt=$row['other_reqt'];
					 $assign_date=$row['assign_date'];
					 $cont_no=$row['cont_no'];
					 $report_at=$row['report_at'];
				
				
					 ?>
					<form   enctype="multipart/form-data" action="job_info_itofficer.php" method="post" >
					
					<?php  	 echo "<input   class='form-control' name='job_no' value='" . $jobno . "' type='hidden'  >"; ?>					
					<?php  	 echo "<input   class='form-control' name='req_user' value='" . $req_user . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='loc_name' value='" . $loc_name . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='dept_name' value='" . $dept_name . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='equipment_descrip' value='" . $equipment_descrip . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='fault_descrip' value='" . $fault_descrip . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='other_reqt' value='" . $other_reqt . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='assign_date' value='" . $assign_date . "' type='hidden'  >"; ?>
					<?php  	 echo "<input   class='form-control' name='cont_no' value='" . $cont_no . "' type='hidden'  >"; ?>					
					<?php  	 echo "<input   class='form-control' name='report_at' value='" . $report_at . "' type='hidden'  >"; ?>
	
					
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
          {''
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




	
	




	   
	      
    
















