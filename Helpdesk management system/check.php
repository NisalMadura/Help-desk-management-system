<?php  
//check.php  
//$connect = mysqli_connect("localhost", "root", "123", "db_helpdesk"); 
include('dbconfig.php') ;
if(isset($_POST["UserName1"]))
{
 $UserName = mysqli_real_escape_string($conn, $_POST["UserName1"]);
 $query = "SELECT * FROM tbl_users WHERE user_code = '".$UserName."'";
 $result = mysqli_query($conn, $query);
 echo mysqli_num_rows($result);
}
?>