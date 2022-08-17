<?php

if (isset($_POST['name'], $_POST['email'])) {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);

	// show the $name and $email
	echo "Thanks $name for your registration.<br>";
	echo "Please verify your email send to $email.";
} else {
	echo 'You need to provide your name and email address.';
}