<?php
include('dbconfig.php') ;

if (isset($_POST['submit'])) {
    //check validation input
    
                $title=$_POST['title'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $userName = $_POST['userName'];
				$displayName=$_POST['displayName'];
				$email = $_POST['email'];
				
				if($_POST['contactNo'] == ''  ){
				$contactNo ='';
				} else {
				$contactNo= $_POST['contactNo'];
				}
				$userType  = $_POST['userType'];
				
				
				if($_POST['newPassword'] == ''  ){
				$Password =$_POST['oldPassword'];
				
				} else {
				$Password = md5($_POST['newPassword']);
				}
    
					if($_POST['status'] == ''  ){
				 $status ='0';
				} else {
				$status ='1';
				}
				

    		if($_POST['location'] == ''  ){
			$location ='';
		   } else {
			$location = $_POST['location'];
				}
    
    
                   	if($_POST['department'] == ''  ){
			$department ='';
		   } else {
			$department = $_POST['department'];
				}
    

	 if($_FILES["file"]["name"] != ''){
				$name = basename($_FILES["file"]["name"]);
				$loc = $_FILES['file']['tmp_name'];
				
			
				
	//$imageName = time().$name;
	
	$filedir = "./images/ProfilePictures/";
        $filepath = $filedir.$name;
	
	move_uploaded_file($loc,$filepath);    
	 
	
	
	 }
	 
	else{
	$name=" ";	
	//$_SESSION['pic_less']='.......Without Profile Picture........';
		
	}                         


	


    $sql_update="UPDATE tbl_users SET title='$title', f_name='$firstName', l_name='$lastName',disp_name='$displayName', email='$email', cont_no='$contactNo', usr_type='$userType', pro_pic='$name', dept_code='$department', loc_code='$location',status='$status', password='$Password' WHERE user_code='$userName'";
 //$sql_insert="INSERT INTO tbl_users (title,firstName,lastName,email,contactNo,userName,userType,locCode,deptCode,status,password,Pro_Picture) VALUES ('$Title','$FirstName','$LastName','$displayName',$Email','$ContactNo','$UserName','$SecLevel','$Location','$Department','$Active','$Password','')";	
			
	//	mysqli_query($conn,$sql_insert);
                                
         if (mysqli_query($conn,$sql_update) === TRUE) {
             
             
        $_SESSION['message_suc'] = '           update successfully';    
        header("location:user_search.php");    
     
} else {
   
    
}                       
                                
    
    
}


 ?> 
  




