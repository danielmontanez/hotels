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
	
    //  Form validation
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
    // Function to see if email is already in database
    public function userExists(){
        
        
            $pdo = Connection::connect();
            $sql = "SELECT user_email FROM user;";
            $users_result = $pdo->prepare($sql);
            $users_result->execute();
            
            while($users = $users_result->fetch(PDO::FETCH_ASSOC)){
                
                if($users['user_email']==$this->email){
                    return false;
                    exit;
                }
            }
            return true;
        
    }
    

    //  Function to create a new user in the USER table
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