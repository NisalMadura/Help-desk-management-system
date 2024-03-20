<?php
$q = $_GET["q"];
include('dbconfig.php');

$sql1 = "select * from tbl_users where user_code like '%$q%'";

$result2= mysqli_query($conn,$sql1);

if ($result2->num_rows > 0) {
echo"<center>";
echo '<table class="table table-hover table-condensed" style="width:500px;">';
 echo "<th> Pay Code </th> <th> Full Name </th>";
while ($row = $result2->fetch_assoc()){
	

  echo "<tr>";
   echo "<td><a style='text-decoration: none;' href='javascript:infoPage(\"" . $row['user_code'] . "\")'>" . $row['user_code'] ."</a>
   
   </td>	<td><a style='text-decoration: none;' href='javascript:infoPage(\"" . $row['user_code'] . "\")'>" . $row['title'] .". ".  $row['f_name'] ." ". $row['l_name'] ."</a></td>														";
	     


        echo "</tr>";
}

echo "</table>";


echo"</center>";












} else {
  echo "<center>No Results Found</center>";  
}





?>
