<?php

require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/models/user.php';

class UserService {
	
	public static function getUserById($id) {
		$pdo = Connection::connect();
        $sql = 'SELECT * FROM USER WHERE id = :id';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
		$user = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User', [null, null, null, null]);

		return $user[0];
    }

}