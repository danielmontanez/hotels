<?php
//approve reservations
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/services/reservationService.php';

$reservation_id = $_GET['id'];
$approve = $_GET['approve'];
$approve = filter_var($_GET['approve'], FILTER_VALIDATE_BOOLEAN);

$approve == true ? ReservationService::approve($reservation_id) : ReservationService::disapprove($reservation_id);
