<?php
include('dbconfig.php');

//check whether user login with session 
if (isset($_SESSION['userType']) AND $_SESSION['userType']!="V" ) {


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
 
//check before User Name 
    	if (isset($_SESSION['userName'])) {
		
		
		$userName=$_SESSION['userName'];
		
		
		}

        else{
             $userName="";
            }
            

            
//check before pic  session
    	if (isset($_SESSION['pic'])) {
		
		
		$pic=$_SESSION['pic'];
		
		
		}

        else{
             $pic="";
            }
	
// select other Inventry
$sql_select_user= "SELECT * FROM `tbl_users` where dept_code=(SELECT dept_code FROM `tbl_users` WHERE user_code=$userName) and  
					loc_code=(SELECT loc_code FROM `tbl_users` WHERE user_code=$userName)and user_code<>$userName";
$select_rst=mysqli_query($conn,$sql_select_user);
 ?> 
  
<!DOCTYPE html>
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
  <!-- style for select own and othere -->
  <link href="fonts/fontcss.css" rel="stylesheet" type="text/css">
  
				<style>

					.inputGroup label {
					  padding: 12px 110px;
					  width:100%;
					  display: block;
					  text-align: center;
					  color: #3C454C;
					  cursor: pointer;
					  position: relative;
					  z-index: 2;
					  transition: color 200ms ease-in;
					  overflow: hidden;
					}
					.inputGroup label:before {
					  width:32px;
					  height: 32px;
					  border-radius: 50%;
					  content: '';
					  background-color: #a3a3a3;
					  position: absolute;
					  left:30%;
					  top: 50%;
					  transform: translate(-50%, -50%) scale3d(1, 1, 1);
					  transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
					  opacity: 0;
					  z-index: -1;
					}
					.inputGroup label:after {
					  width: 32px;
					  height: 32px;
					  content: '';
					  border: 2px solid #D1D7DC;
					  background-color: #fff;
					  background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
					  background-repeat: no-repeat;
					  background-position: 2px 3px;
					  border-radius: 50%;
					  z-index: 2;
					  position: absolute;
					  right: 30px;
					  top: 50%;
					  transform: translateY(-50%);
					  cursor: pointer;
					  transition: all 200ms ease-in;
					}
					.inputGroup input:checked ~ label {
					  color: #fff;
					}
					.inputGroup input:checked ~ label:before {
					  transform: translate(-50%, -50%) scale3d(56, 56, 1);
					  opacity: 1;
					}
					.inputGroup input:checked ~ label:after {
					  background-color: #54E0C7;
					  border-color: #54E0C7;
					}
					.inputGroup input {
					  width: 32px;
					  height: 32px;
					  order: 1;
					  z-index: 2;
					  position: absolute;
					  right: 10px;
					  top: 20%;
					  transform: translateY(-50%);
					  cursor: pointer;
					  visibility: hidden;
					}
			
					body {
					  background-color: #D1D7DC;
					  font-family: 'Fira Sans', sans-serif;
					}
					*, *::before, *::after {
					  box-sizing: inherit;
					}
					html {
					  box-sizing: border-box;
					}
					code {
					  background-color: #9AA3AC;
					  padding: 0 8px;
					}


			</style>
	<!-- end -->
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="images/sierradash.png" class="" style=" width: 25%; 	 z-index :1;  " />
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	  <div class="nav-item">
	  </div>
	  
	  <div class="nav-item" style="margin-top:15px;">
   
		


     </div>
    <div class="nav-item" style="margin-top:10px;">
     <img src="images/ProfilePictures/<?php echo $pic ; ?>" onerror="this.src='images/avatar.png';" class="w3-circle w3-margin-right" style="border-radius: 50px; width:60px; position:relative ;left:10px; top:0px; ">   
		
	 <span style="color:white; position:relative; left:55px; bottom:10px; ">  Welcome!  </span> <br> 
	 <span style="color:white; position:relative; left:80px; bottom:30px; "><strong><?php echo $title. "." ; echo "  " ;echo $displayName ;  ?></strong></span>

     </div>
        
      </ul>
	  
 
     <ul class="navbar-nav ml-auto ">
	  
	  <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
           <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       </li>
	  
	  
	  </ul>

	  
    </div>
  </nav>
  

  <!-- --------------------------------------------------------------------------------------------------------->
  <div class="content-wrapper">
  
    <div class="container-fluid">


<form   enctype="multipart/form-data" action="dashboard.php" method="post" > 

	<div class="card-body"  >
	
			
				<br><br><br><br>
				 <center> 
					<div class="col-8">
							<div  style='background-color:rgba(21, 132, 93, 0.15);border-radius: 30px; font-size: 15px;'>  
									<br><br>
 										<table>
											 <tr>	
												<td>
													  <span class="inputGroup">
														<input  type="radio" onclick="javascript:yesnoCheck();"  id="yesCheck" name="yesno" value="yesCheck"/>
														<label for="yesCheck">Create Other User's Ticket</label>
														</span>
																				
												</td> 
											
												<td>
														<span class="inputGroup">
														<input type="radio" onclick="javascript:yesnoCheck();"  id="noCheck" name="yesno" value="noCheck" />
														<label for="noCheck">Create Own Ticket</label>
														</span>
												</td>	 
											 </tr>
											 
										</table>
<!-- css for select  -->	         
<style>
.select-css {
	<!-- display: block; -->
	font-size: 14px;
	font-family: sans-serif;
	font-weight: 700;
	color: #444;
	line-height: 1.3;
	padding: .6em 1.4em .5em .8em;
	width: 23%;
	max-width: 100%;
	box-sizing: border-box;
	margin: 0;
	border: 1px solid #aaa;
	box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
	border-radius: .5em;
	-moz-appearance: none;
	-webkit-appearance: none;
	appearance: none;
	background-color: #fff;
	background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
	  linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
	background-repeat: no-repeat, repeat;
	background-position: right .7em top 50%, 0 0;
	background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
	display: none;
}
.select-css:hover {
	border-color: #888;
}
.select-css:focus {
	border-color: #aaa;
	box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
	box-shadow: 0 0 0 3px -moz-mac-focusring;
	color: #222;
	outline: none;
}
.select-css option {
	font-weight:normal;
}
</style>
						   <!-- show list of other users -->
																<div id="ifYes" style="visibility:hidden">
																		<br>
							   											SELECT USER ID FOR  CREATE OTHER USER'S TICKET &nbsp; :- &nbsp;
																	
																		<select name="userID"  id="select" class="select-css" Required>
																				<option  value =""> Select User ID*</option>
																			<?php  	while($row1 =mysqli_fetch_assoc($select_rst)):;			 ?>
																				<option value ="<?php  	echo $row1['user_code'] ;			 ?>"> <?php  	echo $row1['disp_name'] ;			 ?> </option>
																			<?php  	endwhile;	?>																				
																		</select>
																		<br>
																</div>
							   <!-- end show list of other users -->

									<br>
									<button type="submit" name="submit" class="" id="register" onclick="return validateForm();"  style="height:60px;width:150px;border-radius: 12px; background-color: #4CAF50;" ><img src="images\icons\conf.png" width="140" height="50"></button>
									<br>
									<br>
							</div>	
							
					</div>					
			 </center> 
	</div>
 
</form> 
 

	
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright &copy; Sierra | IT Department 2019</small>
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
              <span aria-hidden="true">�</span>
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

<script>
	
	function yesnoCheck() {
					if (document.getElementById('yesCheck').checked) {
						document.getElementById('ifYes').style.visibility = 'visible';
					}
					else {
						document.getElementById('ifYes').style.visibility = 'hidden';
					document.getElementById("select").disabled = true;
					}

						}
</script>	

<script>
				function validateForm() {
					var radios = document.getElementsByName("yesno");
					var formValid = false;

					var i = 0;
					while (!formValid && i < radios.length) {
						if (radios[i].checked) formValid = true;
						i++;        
					}

					if (!formValid) alert("Must check some option!");
					return formValid;
										}
</script>

  </div>
  

</body>

</html>
        <?php 
        
    }
         
    else{
        header("location:index.php");
    }
         
    ?>