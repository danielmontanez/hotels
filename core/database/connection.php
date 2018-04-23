<?php
//  Class used every time database needs to be used
class Connection {

    public static function connect() {
        try {
		    return new PDO('mysql:host=127.0.0.1;dbname=hotelDB', 'root', '');
		} catch (PDOException $e) {
		    die('Could not connect.');
		}
    }

}
