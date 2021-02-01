<?php 
include "class.php";

$verified = new Crud();

 if(isset($_GET['vkey'])){
 	 $vkey = $_GET['vkey'];
	 $query = "SELECT active,active_code FROM users WHERE active = 0 AND active_code ='$vkey'";
	 $result =  $verified->con->query($query);
	 if ( $result->num_rows > 0) {
		$update = "UPDATE users SET active = '1' WHERE active_code = '$vkey' LIMIT 1";
		$sql = $verified->con->query($update);
	   if($sql == true){
		echo '<center><div  class="alert alert-success" role="alert">You account has been verified.You my now login!</div></center>';
		 	   echo "<center><a  href='http://localhost/Bootcamp-PHP/index.php#' class='btn btn-info'>Login Now</a></center>";
	   }else{
             echo "eroorr";
	   }
	 }else {
		echo "This account invalid or already verified";
	 }

 }else{
 	die("Something went wrong");
 }


?>