<?php
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/database/connection.php';

//need hotelID and userID in order to make reservation
$hotel_id = $_GET['hotel_id'];
$user_id = $_GET['user_id'];

//connect to database & run query to add the reservation
$pdo = Connection::connect();
$sql = "INSERT INTO reservation (user_id, hotel_id) VALUES (".$user_id." , ".$hotel_id.");";
$reservation_result = $pdo->prepare($sql);
$reservation_result->execute();


//sending back user to view.hotels.php with a success message and it's userID
header('Location:../views/hotels.view.php?user_id='.$user_id.'&success');

?>