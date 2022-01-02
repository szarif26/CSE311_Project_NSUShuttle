<?php

$db = mysqli_connect("localhost","root","","nsu_shuttle");

if(!$db)
{
    die("Connection error: " .mysqli_connect_error());
}
else
{
    echo "Connection Success" . "<br>";
}

    $id = $_POST['ID'];
    $ts = $_POST['time_slot'];
    $way = $_POST['Way'];
    $date = $_POST['Date'];
    $route = $_POST['Stoppages'];
    
$sql = "INSERT INTO bookings(User_ID, Route_ID, Way, Time_Slot, Date) VALUES ($id, '$route', '$way', '$ts', '$date')";

if(mysqli_query($db,$sql))
{ 
   echo "Information added";
}
    else
  {
    echo "There is an error: " . mysqli_error($db);
  } 

    






?>