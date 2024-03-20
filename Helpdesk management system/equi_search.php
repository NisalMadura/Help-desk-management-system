<?php
$q = $_GET["q"];
include('dbconfig.php');

$ab=substr($q,0,3);

if($ab=='CPU'){

		$sql1 = "SELECT CONCAT(brand_descrip,'--',comp_type)AS equipment ,descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
					FROM 
					tbl_equipments e, tbl_brand b, tbl_cpu c,tbl_proc_type t,tbl_vendor v
					WHERE 
					e.cpu_no='$q' and
					e.brand_code=b.brand_code AND
					e.cpu_no=c.cpu_no and
					e.vendor_code=v.vendor_code and
					c.proc_type=t.proc_type";
				}
	
else if($ab=='MON'){
		$sql1 = "SELECT CONCAT(brand_descrip,'--',size)AS equipment,mon_color as descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
					FROM 
					tbl_equipments e, tbl_brand b,tbl_monitor m,tbl_vendor v
					WHERE 
					e.mon_no='$q' and
                    e.mon_no=m.mon_no and
					e.vendor_code=v.vendor_code and
					e.brand_code=b.brand_code";
	
	
}

else if($ab=='UPS'){
		$sql1 = "SELECT CONCAT(brand_descrip,'--',size)AS equipment,descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
					FROM 
					tbl_equipments e, tbl_brand b,tbl_ups u,tbl_ups_model m,tbl_vendor v
					WHERE 
					e.ups_no='$q' and
                    e.ups_no=u.ups_no and
					e.vendor_code=v.vendor_code and
					e.brand_code=b.brand_code AND
                    u.model_code=m.ups_model_no";
	
	
}

else if($ab=='SCA'){
		$sql1 = "SELECT CONCAT(brand_descrip,'--',scN_type)AS equipment,scn_color as descrip,w_expiry_date,vendor_name,date_purchase,e.vendor_code
					FROM 
					tbl_equipments e, tbl_brand b,tbl_scaner s,tbl_vendor v
					WHERE 
					e.scn_no='$q' and
                    e.scn_no=s.scn_no and
					e.vendor_code=v.vendor_code and
					e.brand_code=b.brand_code";
	
	
}
else {
	$sql1 = "select * from tbl_equipments where pc_type='$q'";
}


$result2= mysqli_query($conn,$sql1);

if ($result2->num_rows > 0) {



while ($row = $result2->fetch_assoc()){


$expiry_date=$row['w_expiry_date'];
$purchase_date=$row['date_purchase'];
	

	
	//date('Y-m-d', strtotime('+5 years'));
	$datenow= date("Y-m-d");

	

  echo"<center>";
   echo  "<span style='font-size: 13px'; >". "<b>".$row['equipment'] ."-".$row['descrip']."</b>"."</span>"."</br> ";
   echo"</center>";
 

$date = date_create($expiry_date);  
date_add($date, date_interval_create_from_date_string('2 years'));  
$agree_exp= date_format($date, 'Y-m-d'); 
   
    echo "<table style='border-collapse:separate;border-spacing:2 8px; font-size: 13px;' >";

if($ab=='CPU'){
	
	
					if($expiry_date>$datenow ){
						
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style=' font-size: 13px; color:Green'; > In Warranty</b></td>";
						  echo "</tr>";
						
		

					}

					else if ($expiry_date<$datenow and $expiry_date>$agree_exp){
						
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; color:Yellow'; > Agreement</b></td>";
						  echo "</tr>";						
						
	
					 }
					else
					{
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; color:Red'; > Agreement is Expired</b></td>";
						  echo "</tr>";		
							
					}
						
	
	
	
				}

else if($ab=='MON')

{
	
					if($expiry_date>$datenow ){
						
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style=' font-size: 13px; color:Green'; > In Warranty</b></td>";
						  echo "</tr>";
					}

					else if ($expiry_date<$datenow and $expiry_date>$agree_exp){
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; color:Yellow'; > Agreement</b></td>";
						  echo "</tr>";
					 }
					else
					{
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; color:Red'; > Agreement is Expired</b></td>";
						  echo "</tr>";		
							
					}
						
	
}

else if($ab=='UPS')
{
						if($expiry_date>$datenow ){
						
					  	echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style=' font-size: 13px; color:Green'; > In Warranty</b></td>";
						  echo "</tr>";

					}
					else
										{
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; color:Red'; > Warranty is Expired</b></td>";
						  echo "</tr>";						
					
					}
					
	
}

else if($ab=='SCA')
{
						if($expiry_date>$datenow ){
						
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style=' font-size: 13px; color:Green'; > In Warranty</b></td>";
						  echo "</tr>";

					}
					else
										{
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; color:Red'; > Warranty is Expired</b></td>";
						  echo "</tr>";		
					
					}


}
else if($ab=='PRI')
{
						if($expiry_date>$datenow ){
						
						  echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style=' font-size: 13px; color:Green'; > In Warranty</b></td>";
						  echo "</tr>";
					}
					else
										{
						   echo "<tr>";						
						  echo "<td><b>Agreement Type</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; color:Red'; > Warranty is Expired</b></td>";
						  echo "</tr>";		
					}


}

  

$vendor_code1=$row['vendor_code'];

						  
						  
						  echo "<tr>";						
						  echo "<td><b>Date of Expiry</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px; ' >". $row['w_expiry_date']."</b></td>";
					 	 echo "<input   class='form-control' name='vendor_code2' value='" . $vendor_code1. "'  type='hidden'  >"; 
						 // echo "<input   class='form-control' name='vendor_code2' value='" . $vendor_code1. "'  type='hidden'  >"; 
						  echo "</tr>";	


						  echo "<tr>";						
						  echo "<td><b>Vendor</b></td>";
						  echo "<td><b>:-</b></td>";
						  echo "<td><b><span style='font-size: 13px;' >". $row['vendor_name']."</b></td>";
						  echo "</tr>";	
	
	











echo "</table>";




} 
}

else {
  echo "<center>No Results Found</center>";  
}





?>
