<?php 

$db = mysqli_connect("localhost","root","","nsu_shuttle");

if(!$db)
{
    die("Connection error: " .mysqli_connect_error());
}

    $name = $_POST['Name'];
 
    $sql = "DELETE FROM stoppages WHERE Name= '$name'";  
 
if(mysqli_query($db,$sql))
{ 
   echo "Stoppage Removed.";
}
    else
  {
    echo "There is an error: " . mysqli_error($db);
  } 
?>