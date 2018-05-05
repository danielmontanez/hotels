<?php

require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/database/connection.php';
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/models/reservation.php';
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/services/userService.php';
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/services/hotelService.php';

$pdo = Connection::connect();
$sql = 'SELECT * FROM RESERVATION';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$reservations = $stmt->fetchAll();

require $_SERVER['DOCUMENT_ROOT'].'/hotels/public/views/hotels.admin.view.php';
