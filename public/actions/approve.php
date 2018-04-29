<?php
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/database/connection.php';

$pdo = Connection::connect();

$reservation_id = $_POST['reservation_id'];

$sql = "SELECT CAST(reservation_approved AS unsigned integer) AS approved FROM reservation WHERE reservation_id =".$reservation_id.";";
$reservation_result = $pdo->prepare($sql);
$reservation_result->execute();

while($reservation = $reservation_result->fetch(PDO::FETCH_ASSOC)){
    
if($reservation['approved']==1)     {
        $changeApproved_sql = "UPDATE reservation SET reservation_approved = 0 WHERE reservation_id =".$reservation_id.";";
    }
    else {
         $changeApproved_sql = "UPDATE reservation SET reservation_approved = 1 WHERE reservation_id =".$reservation_id.";";
    }
    $change = $pdo->prepare($changeApproved_sql);
    $change->execute();
    

	header('Location: ../views/hotels.view.admin.php?');
    
}




?>