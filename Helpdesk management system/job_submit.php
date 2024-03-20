<?php
include('dbconfig.php');
if (isset($_POST['submit'])) {

//////////////////////////////////////////////////// Job No creatian//////////////

//select view the last job no

$sql_tbl_lastjob= "SELECT last_job_no FROM `tbl_last_job`";
$job_rst=mysqli_query($conn,$sql_tbl_lastjob);
$row1= $job_rst->fetch_assoc();

$date=date("Ym");
$FOLIO=1+$row1['last_job_no'];
if($FOLIO<> "")
		{
				while(strlen($FOLIO)<4)
			{
					$FOLIO="0".$FOLIO;
				}
				$job_no=  $date.$FOLIO;
			}
			
		
	
			
			
////////////////////////////////////////////////////////////////////////////////	



	if($_POST['equipments_types'] == ''  )
				{
					$user_equipments_types='';
				}
				else 
				{
					$user_equipments_types= $_POST['equipments_types'];
				}		
			
	if($_POST['fault'] == ''  )
				{
					$user_fault='';
				}
				else 
				{
					$user_fault= $_POST['fault'];
				}		
			
	if($_POST['discription'] == ''  )
				{
					$user_discription='';
				}
				else 
				{
					$user_discription= $_POST['discription'];
				}			
			
//log karapu kena			
$login_user=$_SESSION['userName'];
//error eka una kena
$report_at_user=$_SESSION['report_at'] 	;	
date_default_timezone_set("Asia/colombo");
$date_enter= date("Y-m-d H:i:s");			
				
				
				
				
				
				
				
				
				
$sql_insert="INSERT INTO tbl_jobs(job_no,report_at,log_by,date_enter,loc_code,dept_code,item,fault_reqt,other_reqt,job_status) VALUES ('$job_no','$report_at_user','$login_user','$date_enter',(select loc_code FROM tbl_users where user_code=$report_at_user),(select dept_code FROM tbl_users where user_code=$report_at_user),'$user_equipments_types','$user_fault','$user_discription','1')";		
				


			
	  if (mysqli_query($conn,$sql_insert) === TRUE) {
             	mysqli_query($conn,$sql_insert) ;
			
			/// update last job no +1		
			$sql_update="UPDATE tbl_last_job SET last_job_no=last_job_no+1";
			mysqli_query($conn,$sql_update);
				
				
				
				
			
			           
			$_SESSION['message_sucdepo'] = $job_no;    
       header("location:create_New_Job.php");    
     
} else {
 
    
} 

    }
         
    else{
        header("location:index.php");
    }


 ?> 
  




