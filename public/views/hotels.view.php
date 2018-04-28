<?php

include_once "includes/_header.php"; 
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/database/connection.php';

$pdo = Connection::connect();
$sql="SELECT * FROM hotel;";

$hotels_results=$pdo->prepare($sql);
$hotels_results->execute();


if($hotels_results->rowCount() < 1)
    echo"<h1>No hotels available</h1>";

?>
<div class="container">
  <h1>Hotels available</h1>
    <div class="row">
             
<?php
while ($hotels=$hotels_results->fetch(PDO::FETCH_ASSOC)){
    
    $hotel_name = $hotels['hotel_name'];
    $hotel_desc = $hotels['hotel_desc'];
    $hotel_image = $hotels['hotel_image'];
    

    
    
echo"
    <div class='col-md-4'>
      <div class='thumbnail'>
          <img src=".$hotel_image." alt=".hotel_name." style='width:100%'>
          <h3>".$hotel_name."</h3>
          <div class='caption'>
            <p>".$hotel_desc."</p>
          </div>
      </div>
    </div>
    
    ";
}

?>

  </div>
</div>

<?php include_once "includes/_footer.php"; ?>