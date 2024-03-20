<?php
    $cardno = $_GET['cardno'];
    include('dbconfig.php');	
//check whether user login with session 
if (isset($_SESSION['userType'])) {  
  	
	
	
	
  //$sqlw = "SELECT * FROM tbl_jobs WHERE job_no = '$cardno'";
 $sqlw =   "SELECT job_no, date_enter,title,disp_name,dept_name,loc_name,other_reqt,equipments_descrip,fault_description
FROM
 tbl_jobs j, tbl_users u,tbl_department d ,tbl_location l,tbl_faults f,tbl_equipments_type e

WHERE
j.report_at=u.user_code AND
j.dept_code=d.dept_code and
j.loc_code=l.loc_code and
j.fault_reqt=f.fault_code and
j.item=e.equipments_type_code and
job_no = '$cardno'";



   $result = mysqli_query($conn,$sqlw);
  $row = $result->fetch_assoc();

  
//select Operation Officer
$select_Operation= "SELECT * FROM tbl_users WHERE usr_type = 'O'";
$row_Operation_Officer = mysqli_query($conn,$select_Operation);

//////
//select 
?>
   <B> User Log Ticket </B>
  <ol class="breadcrumb">

<?php

    echo "<br>";
    echo "<div class='container-fluid'>";
    echo "<div style='overflow: auto;'>";
    echo "<table class='table table-responsive'>";
	
    echo "<tr>";
    echo "<td style='width: 20%;'><b>Job No</b></td>";
    echo "<td>: " . $row['job_no'] . "</td>";
	echo "<td><b>Reported User</b></td>";
    echo "<td>: " . $row['title'] ." ".  $row['disp_name'] .".</td>";
    echo "</tr>";
	
	echo "<tr>";
    echo "<td><b>Location</b></td>";
    echo "<td>: " . $row['loc_name'] . "</td>";
	echo "<td><b>Department</b></td>";
    echo "<td>: " . $row['dept_name'] . "</td>";
    echo "</tr>";
	
	echo "<tr>";
	echo "<td><b>Fault</b></td>";
    echo "<td>: " . $row['equipments_descrip'] . "</td>";
    echo "<td><b>Fault Description</b></td>";
    echo "<td>: " . $row['fault_description'] . "</td>";
    echo "</tr>";

    echo "</table>";
    echo "</div>";
	
	
?>


 </ol>

</br>
</br>
<form   enctype="multipart/form-data" action=""  onsubmit="alert('Sucessfully Assign IT Officer for the Job');" method="post"  >
          <div class="form-group">
		   <div class="form-row">
		  <div class="col-md-3">
		<b>	 Select Operation Officer</b>
		</div>	 
				<div class="col-md-5">
		<select name="helpdesk_officer"  class="form-control" required>
								<option value =""selected>Choose an IT Officer </option>  
							<?php  	while($row1 =mysqli_fetch_array($row_Operation_Officer)):;	?>
							
                                                        <option value ="<?php  	echo $row1[6] ;	?>"> <?php  echo $row1[0].". ".$row1[3] ;	?> </option>
                                                        <?php  	endwhile;	?>	
                  			</select>
							
													<div style=display:none;;>
						<?php  	 echo "<input   class='form-control' name='job_no' id='user_code' value='" . $cardno . "' type='text'  >"; ?>
						
						</div>
						

				</div>	
				
			  <div class="col-md-3">
					
<center><button type="submit" name="submit" class="btn btn-secondary"   >Submit</button> 		</center>
		</div>	
				
				
</div>	



		</div>
 
 </form>


 <?php 
        
    }
         
    else{
        header("location:index.php");
    }
         
    ?>  
  
 
 
 
 