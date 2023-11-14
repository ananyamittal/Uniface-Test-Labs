<?php
$server= "localhost";
$user= "root";
$password= '';
$db_name= "dsw_project";
$conn= mysqli_connect($server , $user, $password , $db_name);
if($conn){
// echo "database_connected";

}
else{
echo"unable to connect database";
}

?>