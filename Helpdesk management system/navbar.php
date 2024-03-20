<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="images/sierradash" class="" style=" width: 25%; 	 z-index :1;  " />
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
  
  
		<span class="dropdown-divider "></span>
		  
		
<!--Dashboard section --> 		  
		  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
		
<!--End Dashboard section --> 	

<!-- ---------------------------------------------------------- -->	
	
<!--Create JOB section --> 
  
			<li class="nav-item" data-toggle="tooltip" data-placement="right" 

				<?php if($userType=="V") 
						{ ?>
						style="display:none";>  
				<?php 
						}			
					else { ?>	style="display:block";>   
					<?php 	}    ?>
								
				<a class="nav-link" href="create_New_Job.php">
					<i class="fa fa-fw fa fa-plus-circle "></i>
					<span class="nav-link-text">Create New Job</span>
					</a>
			</li>
		
 <!-- end Create JOB section --> 
	
<!-- ---------------------------------------------------------- -->	
    
	
<!--Pendding JOB section --> 		
     	
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" <?php if($userType=="U") 
						{ ?>
						style="display:none";>  
				<?php 
						}			
					else { ?>	style="display:block";>   
					<?php 	}    ?>
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" >
            <i class="fa fa-fw fa fa-hourglass-half"></i>
            <span class="nav-link-text">Pending Jobs</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
		  <!-- HElpdesk officer -->	
            <li		<?php if($userType=="H") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>

              <a href="admin_Pen_Job.php">Need to Complete Jobs</a>
            </li>
			<!-- Operational Staff -->	
			 <li		<?php if($userType=="O") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>

              <a href="itOfficer_pen_job.php">Pending Jobs</a>
            </li>
			
			 <li <?php if($userType=="O") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>
              <a href="itOfficer_pen_com.php">Need to Complete Jobs</a>
            </li>
			
			
		<!-- Authorization Officer -->	
			<li <?php if($userType=="A") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>
              <a href="app_officer_pen_job.php">Need to Complete Jobs</a>
            </li>
		<!-- Vendor-->	 
            <li <?php if($userType=="V") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>
              <a href="vendor_pen_job.php">Pending Jobs</a>
            </li>
			 
			 <li <?php if($userType=="V") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>
              <a href="vendor_pen_com.php">Need to Complete Jobs</a>
            </li>
			
			
          </ul>
        </li>
		
<!-- END Pendding JOB section --> 		
		


<!-- ---------------------------------------------------------- -->			
		

<!-- View JOb Status section --> 
		
<li class="nav-item" data-toggle="tooltip" data-placement="right"     >
    <a class="nav-link" href="job_search.php">
            <i class="fa fa-fw 	far fa-bell-slash "></i>
            <span class="nav-link-text">  View Job Status  </span>
 

          </a>
        </li>
		

<!-- END View JOb Status section --> 		


<!-- ---------------------------------------------------------- -->			
		

<!-- Reports section --> 

   <li class="nav-item" data-toggle="tooltip" data-placement="right" <?php if($userType=="A") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>
					
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"  href="#collapseComponents3" >
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Reports</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents3" >
            <li>
              <a href="report.php">Job Status</a>
            </li>
			  <li>
              <a href="history.php">Repair History</a>
            </li>
		    </ul>
        </li>


<!-- END Reports section --> 		
		
<!-- ---------------------------------------------------------- -->			
		

<!--Create New User section --> 			
		   <li class="nav-item" data-toggle="tooltip" data-placement="right" 
		   <?php if($userType=="H") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>
	
          <a class="nav-link" href="create_New_User.php">
		
            <i class="fa fa-fw fa-user-plus "></i>
            <span class="nav-link-text"> Create New User</span>
          </a>

        </li>

<!--END Create New User section --> 	


<!-- ---------------------------------------------------------- -->			
		

<!-- Update User Details section --> 
		
<li class="nav-item" data-toggle="tooltip" data-placement="right" <?php if($userType=="H") 
						{ ?>
						style="display:block";>  
				<?php 
						}			
					else { ?>	style="display:none";>   
					<?php 	}    ?>
          <a class="nav-link" href="user_search.php">
            <i class="fa fa-fw 	fa-edit "></i>
            <span class="nav-link-text">  Update User Details </span>
 

          </a>
        </li>	

<!-- END Update User Details section -->  

<!-- ---------------------------------------------------------- -->


<!-- Settings section --> 	
		
		
    <li class="nav-item" data-toggle="tooltip" data-placement="right" >
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse"  href="#collapseComponents2" >
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Settings</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2" >
            <li>
              <a href="passwordchange.php">Change the Password</a>
            </li>
		    </ul>
        </li>
<!-- END Settings section --> 			
   

     
       
      </ul>
	  

  
     <ul class="navbar-nav ml-auto ">
	  
	  <li class="nav-item">
         <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
           <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       </li>
	  
	  
	  </ul>
	  
	  
	  
	  
	  
    </div>
</nav>