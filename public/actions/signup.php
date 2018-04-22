<?php

require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/services/SignupProcess.php';

$signup = new SignUpProcess($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);

if ($signup->validateForm()) {
	$signup->signUp();
	header('Location: /hotels/public/views/hotels.view.php');
	exit();
} else {
	header('Location: /hotels/public/views/signup.view.php?error');
	exit();
}