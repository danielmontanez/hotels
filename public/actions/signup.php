<?php

require $_SERVER['DOCUMENT_ROOT'].'/hotels/core/services/SignupProcess.php';

$signup = new SignUpProcess($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);

if ($signup->validateForm()) {
    //  If form is valid, a new user is created in the database & sends user to view hotels page
	$signup->signUp();
	header('Location: /hotels/public/views/hotels.view.php');
	exit();
} else {
    // If form isn't valid, returns to sign up page displaying error
	header('Location: /hotels/public/views/signup.view.php?error');
	exit();
}