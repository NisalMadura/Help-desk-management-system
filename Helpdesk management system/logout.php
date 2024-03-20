<?php

//	echo "Logged out scuccessfully";
    
    session_start();
	session_destroy();

	
	header("location:index.php");

?>