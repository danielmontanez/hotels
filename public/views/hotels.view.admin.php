<?php

include_once "includes/_header.php"; 
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/database/connection.php';
// retrieving rows from reservation table, casting approved bit field as numeric
$pdo = Connection::connect();
$sql="SELECT reservation_id, user_id, hotel_id, CAST(reservation_approved AS unsigned integer) AS approved FROM reservation;";

$reservations_results=$pdo->prepare($sql);
$reservations_results->execute();


?>
<?php
if($reservations_results->rowCount() < 1)
    echo"<h1 style='color:red'>No reservations at this time.</h1>";
else{
?>
<body>
    <div id="container">
<h1>Reservations</h1>
<div class="table-responsive">          
  <table class="table table-hover">  
    <tr>
        <th> Reservation ID</th>
        <th> User ID</th>
        <th> Hotel ID</th>
        <th> Reservation Approved</th>
    </tr>
<?php 
     while ($reservation = $reservations_results->fetch(PDO::FETCH_ASSOC)){
    echo "
    <tr>
    <td>".$reservation['reservation_id']."</td>
    <td>".$reservation['user_id']."</td>
    <td>".$reservation['hotel_id']."</td>
    <td><form class='form-inline' action='../actions/approve.php' method='GET' >
      <div class='checkbox'>
      <label><input type='checkbox' value='approved'";  if($reservation['approved']==1) echo "checked";  echo">Approved</label>
            </div>
         &nbsp;<input type='submit' value='Save'>
        </form>
    </td>
    </tr>
    
    
    
    ";
        
   
      
         
             
}
    ?>



</table>
        </div>
    </div>
</body>
<?php } ?>