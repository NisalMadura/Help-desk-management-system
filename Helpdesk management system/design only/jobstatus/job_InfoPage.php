	<?php
    $cardno = $_GET['cardno'];
    include('dbconfig.php');
		
    
    $sqlw = "SELECT * FROM tbl_users WHERE userName = '$cardno'";

    $result = mysqli_query($conn,$sqlw);
    $row = $result->fetch_assoc();

?>
<?php

//view the department option list (select from database)
//select option department discription
$sql_select_department= "SELECT * FROM `tbl_department`";
$department_rst=mysqli_query($conn,$sql_select_department);	

//view the location option list(select from database)
$sql_select_location= "SELECT * FROM `tbl_location`";
$location_rst=mysqli_query($conn,$sql_select_location);




//view the title option list(update )


$sql_title= "SELECT * FROM `tbl_location`";
$location_rst=mysqli_query($conn,$sql_select_location);

			 

//view the deptCode option list(update details)
$deptCode=$row['deptCode'] ;        
$sql_deptCode= "SELECT * FROM tbl_department where deptCode='$deptCode' ";                                                           
$deptCode_rst=mysqli_query($conn,$sql_deptCode); 
$row5 =mysqli_fetch_array($deptCode_rst);

//view the locCode option list(update details)
$locCode=$row['locCode'] ;        
$sql_locCode= "SELECT * FROM tbl_location where locCode='$locCode' ";                                                           
$locCode_rst=mysqli_query($conn,$sql_locCode); 
$row6 =mysqli_fetch_array($locCode_rst);







?>

        <form   enctype="multipart/form-data" action="user_Update.php" method="post" >
          
            
          <div class="form-group ">
              

            
		       <div class="form-row ">
						 <div class="col-md-2">
                <label>Title</label>
					<select name="title"  class="form-control" >

								<?php 		 
									if($row['title']==="Mr")
									{?>
								<option value="Mr">Mr</option>
								<option value="Ms">Ms</option>
							   <?php 	
									}	 
								else{
									?>
								<option value="Ms">Ms</option>
								<option value="Mr">Mr</option>
							
								<?php 
									}
								?>
				</select>	
              </div>
			
              <div class="col-md-5">
                <label>First name   <Span id='frist'style="color:red;"></Span></label>
               
               <?php  	 echo "<input   class='form-control' name='firstName' id='fristName' value='" . $row['firstName'] . "' type='text'  >"; ?>
              
              
              </div>
              <div class="col-md-5">
                <label>Last name <Span id='last'style="color:red;"></Span></label>
               <?php  	 echo "<input   class='form-control' name='lastName' id='lastName' value='" . $row['lastName'] . "' type='text'  >"; ?>
		              		
              </div>
            </div>
          </div>
		<div class="form-group">
				<div class="form-row ">
					<div class="col-md-6">
						<label >User Name </label>  <Span style="color:red;">* Can't change the user Name</Span>    <span id='usmsg' style="color:red;"> </span>   <span id='availability'></span> 
						<div>  <?php  	 echo       $row['userName'] ;?></div>
						<div style=display:none;>
						<?php  	 echo "<input   class='form-control' name='userName' id='userName' value='" . $row['userName'] . "' type='text'  >"; ?>
						</div>
					</div>
			  
                                        <div class="col-md-6">
				
                                                 <label>Display Name</label>  <Span id='dis'style="color:red;"></Span>
					<?php  	 echo "<input   class='form-control' name='displayName' id='displayName' value='" . $row['displayName'] . "' type='text'  >"; ?>
			
					
                                        </div> 
					
					
				</div>
		  </div>	  
		  
		<div class="form-group">
		  
		  <div class="form-row">
				<div class="col-md-7">
                                    <label>Email Address</label> <span id="emailmsg" style="color:red" ></span> 
                                    <?php  	 echo "<input   class='form-control' name='email' id='email' value='" . $row['email'] . "' type='text' >"; ?>
				</div>
					<div class="col-md-5">
					<label>Contact Number</label>  <span id="conmsg" style="color:red" ></span>
   <?php  	 echo "<input   class='form-control' name='contactNo' id='contactNo' value='" . $row['contactNo'] . "' type='text'  >"; ?>
				</div> 
                      
                      
                      
			
           </div>
		  
		</div>
		  
		 
		  
		  <div class="form-group">
		  
		  <div class="form-row">
				<div class="col-md-8">
                                    <label>Profile Picture</label> <span style="color:red; font-size:14px ;">    &NonBreakingSpace; &NonBreakingSpace;  *  Only JPGE, PNG & GIF files are allowed and Upto 100Kb. </span>
					<br/><input  id="img" type="file" name="file" onchange="return validateImage()">
                                        <div id="valid_msg" style="color:red;"> 	</div>
													
										
										
										
										
				</div>
			

                      
                      	<div class="col-md-4">
						<label>Account Type</label> 
						
										<select name="userType"  class="form-control" >
													
																<?php 		 
															if($row['userType']==="A")
																{?>
																<option value="A" selected>Admin</option> 
																<option value="R">Report User</option>
																<option value="O">Operation Staff</option>
																<option value="V">Vender</option>
																<option value="C">Client</option>
																<?php 	
												}	 
											else if ($row['userType']==="R"){
												?>
										
																<option value="A" >Admin</option> 
																<option value="R" selected>Report User</option>
																<option value="O">Operation Staff</option>
																<option value="V">Vender</option>
																<option value="C">Client</option>
										
										
										
											<?php 
												}
											
													
														else if ($row['userType']==="O"){
												?>
										
																<option value="A" >Admin</option> 
																<option value="R" >Report User</option>
																<option value="O" selected>Operation Staff</option>
																<option value="V">Vender</option>
																<option value="C">Client</option>
										
											<?php 
												}
										

											
													
														else if ($row['userType']==="V"){
												?>
										
																<option value="A" >Admin</option> 
																<option value="R" >Report User</option>
																<option value="O" >Operation Staff</option>
																<option value="V" selected>Vender</option>
																<option value="C">Client</option>
										
											<?php 
												}
																		else if ($row['userType']==="C"){
												?>
										
																<option value="A" >Admin</option> 
																<option value="R" >Report User</option>
																<option value="O" >Operation Staff</option>
																<option value="V" >Vender</option>
																<option value="C" selected>Client</option>
										
											<?php 
												}
												
												
												
											?>		
													
														  
													</select>	              
					</div>
                      
                      
			  
           </div>
		  
		  </div>
		  
		  
               <div class="form-group">
		 
		  
            <div class="form-row">
              <div class="col-md-6">
                <label >Department</label>  
                
            
									<select name="department"  class="form-control" >
							<?php  	while($row1 =mysqli_fetch_array($department_rst)):;			 ?>
                                                        <option value ="<?php  	echo $row1[0] ;			 ?>"> <?php  	echo $row1[1] ;			 ?> </option>
                                                        <?php  	endwhile;	?>	
                                                         <option value ="<?php  	echo $row5[0] ;			 ?>" selected> <?php  	echo $row5[1] ;			 ?> </option>   
                                                            
                                                            

							</select>
                
              </div>
			
              <div class="col-md-6">
                <label >Location</label>
                
                
                <select name="location"  class="form-control" >
							<?php  	while($row1 =mysqli_fetch_array($location_rst)):;			 ?>
                                                        <option value ="<?php  	echo $row1[0] ;			 ?>"> <?php  	echo $row1[1] ;			 ?> </option>
                                                        <?php  	endwhile;	?>	
                                                         <option value ="<?php  	echo $row6[0] ;			 ?>" selected> <?php  	echo $row6[1] ;			 ?> </option>   
                                                            
                                                            

							</select>
                
                 
              </div> 
			  
            </div>
			 
         </div>     
            
  		   
          <div class="form-group">
		 
		  
            <div class="form-row">
              <div class="col-md-6">
                <label >Password</label>  
                <input class="form-control" name="newPassword" type="password"  placeholder="Password" >
              </div>
			  <div style=display:none;>
						<?php  	 echo "<input   class='form-control' name='oldPassword'  value='" . $row['password'] . "' type='text'  >"; ?>
						</div>
			  
			  
			  
			
              <div class="col-md-6">
             <label > Deactive / Active </label> 
			 <?php 		 
		if($row['status']=="1")
		{?>
				
			 <center><div>
			<label class="switch">
			<input name='status' type="checkbox" checked>
			<span class="slider round"></span>
			</label>
			</div>			
			</center>  
 <?php 		 
					
									}
									
									
									
				else {
					?>
			<center><div>
			<label class="switch">
			<input name='status' type="checkbox">
			<span class="slider round"></span>
			</label>
			</div>			
			</center>  	
					
					
			 <?php 			
					
				}
?>
			
              </div> 
			  
            </div>
		
			
			
			
			
			 
         </div>
	

		<center> 
		
		 <button type="submit" name="submit" class="btn btn-primary" id="update" onclick="return checkValidations_update();"  >update</button>
		
		    
		 
		  </center>  

            
            

            
            
            
            
        </form>
		
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>	
		
		