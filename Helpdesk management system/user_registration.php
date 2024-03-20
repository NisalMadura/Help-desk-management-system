<?php
include('dbconfig.php') ;

if (isset($_POST['submit'])) {
    //check validation input
    
                $title=$_POST['title'];
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $userName = $_POST['UserName1'];
		$Password = $_POST['password_1'];                          
                $userType  = $_POST['userType'];     
                $status ='1';
                $displayName=$_POST['displayName'];
                                            			
		if($_POST['contactNo'] == ''  ){
			$contactNo ='';
		   } else {
			$contactNo= $_POST['contactNo'];
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
    

    if($_FILES["file"]["name"] == ''  ){
			$name  ='';
			$loc ='';
                        $_SESSION['pic_less']='.......Without Profile Picture........';
		   } else {
			$name = basename($_FILES["file"]["name"]);
				$loc = $_FILES['file']['tmp_name'];
				}
			
				
	//$imageName = time().$name;
	
	$filedir = "./images/ProfilePictures/";
        $filepath = $filedir.$name;
	
	move_uploaded_file($loc,$filepath);                                

    
 //encrypt the password before saving in the database
	    
    $encrpitedpass = md5($Password);   
					

    $sql_insert="INSERT INTO tbl_users(title, f_name, l_name,disp_name, email, cont_no, user_code, usr_type, pro_pic, dept_code, loc_code, status, password) VALUES ('$title', '$firstName', '$lastName','$displayName', '$email', '$contactNo', '$userName', '$userType', '".$name."', '$department', '$location', '$status', '$encrpitedpass')";
 //$sql_insert="INSERT INTO tbl_users (title,firstName,lastName,email,contactNo,userName,userType,locCode,deptCode,status,password,Pro_Picture) VALUES ('$Title','$FirstName','$LastName','$displayName',$Email','$ContactNo','$UserName','$SecLevel','$Location','$Department','$Active','$Password','')";	
			
	//	mysqli_query($conn,$sql_insert);
                                
         if (mysqli_query($conn,$sql_insert) === TRUE) {
             
             
        $_SESSION['message_suc'] = '           Submit successfully';    
         header("location:create_New_User.php");    
     
} else {
   
    
}                       
                                
    
    
}


 ?> 
  




