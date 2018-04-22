<?php

require $_SERVER['DOCUMENT_ROOT'].'/core/services/SignUpProcess.php';

$signup = new SignUpProcess($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password']);

if ($signup->validateForm()) {
	$signup->signUp();
	header('Location: /public/views/hotels.view.php');
	exit();
} else {
	header('Location: /public/views/signup.view.php?error');
	exit();
}