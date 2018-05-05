<?php

require $_SERVER['DOCUMENT_ROOT'].'/core/database/connection.php';
require $_SERVER['DOCUMENT_ROOT'].'/core/models/reservation.php';
require $_SERVER['DOCUMENT_ROOT'].'/core/services/userService.php';
require $_SERVER['DOCUMENT_ROOT'].'/core/services/hotelService.php';

// Get reservations
// Get Hotels and users
// Make table and wrap with form 
// Add hidden input for the id

$pdo = Connection::connect();
$sql = 'SELECT * FROM RESERVATION';
$stmt = $pdo->prepare($sql);
$stmt->execute();

$reservations = $stmt->fetchAll();

require $_SERVER['DOCUMENT_ROOT'].'/public/views/hotels.admin.view.php';
