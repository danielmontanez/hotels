<?php

require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/models/hotel.php';

class HotelService {
	
	public static function getHotelById($id) {
		$pdo = Connection::connect();
        $sql = 'SELECT * FROM HOTEL WHERE id = :id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
		$hotel = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Hotel', [null, null, null, null]);

		return $hotel[0];
    }

}