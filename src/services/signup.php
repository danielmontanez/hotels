<?php

require '../src/models/user.php';
require '../src/models/connection.php';


class SignUpProcess {

	protected $name;
	protected $email;
	protected $password;

	function __construct($name, $email, $password) {
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;		
	}
	
	public function validateForm() {
		$this->submitted = $submitted;
	}

}