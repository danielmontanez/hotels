<?php

require $_SERVER['DOCUMENT_ROOT'].'/core/database/connection.php';
require $_SERVER['DOCUMENT_ROOT'].'/core/models/user.php';

class SignUpProcess {

	protected $name;
	protected $email;
	protected $password;
	protected $confirm_password;
	protected $pdo;

	public function __construct($name, $email, $password, $confirm_password) {
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;		
		$this->confirm_password = $confirm_password;		
	}
	
	public function validateForm() {
		if (!empty($this->name) && 
            !empty($this->email) && 
            !filter_var($this->email, FILTER_VALIDATE_EMAIL) === false && 
            !empty($this->password) && 
            $this->password == $this->confirm_password ) {
			return true;
		}

		return false;
	}

	public function signUp() {
		try {
			$pdo = Connection::connect();
			$user = new User($this->name, $this->email, $this->password);
			$sql = 'INSERT INTO USER (user_name, user_email, user_password) VALUES (:name, :email, :password)';

			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':name', $user->getName());
			$stmt->bindParam(':email', $user->getEmail());
			$stmt->bindParam(':password', $user->getPassword());

			$stmt->execute();	
		} catch (Exception $e) {
			echo "Couldn't add user";
		}
	}

}