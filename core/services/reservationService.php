<?php
// used to approve or disapprove reservations in admin view
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/database/connection.php';
require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/models/reservation.php';

class ReservationService {
    
    public static function getReservationById($id) {
        $pdo = Connection::connect();
        $sql = 'SELECT * FROM reservation WHERE id = :id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $reservation = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'reservation', [null, null, null, null]);

        return $reservation[0];
    }
    public static function approve($id) {
        $pdo = Connection::connect();
        $sql = 'UPDATE reservation SET approved = 1 WHERE id = :id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public static function disapprove($id) {
        $pdo = Connection::connect();
        $sql = 'UPDATE reservation SET approved = 0 WHERE id = :id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

}
