<?php

use Core\App;
use Core\Database;
use Core\Validator;

// Create new database instance

$db = App::resolve(Database::class);

// Store the form inputs

$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['password'];

// Validate form inputs

$errors = [];

// Validate name

if (! Validator::string($username, 3, 50)) {
    $errors['username'] = 'Please enter a username greater than 3 characters, but less than 50.';
}

// Validate email

if (! Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

//Validate password

if (! Validator::string($pwd, 8, 255)) {
    $errors['password'] = 'Please enter a password greater than 8 characters.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

// Check if current user exists

$user = $db->query('SELECT * FROM users WHERE email = :email OR username = :username', [
    'email' => $email,
    'username' => $username,
])->fetch();

// If user exists, redirect to homepage - If it doesn't, create user then redirect

if ($user) {
    header('Location: /');
    die();
} else {

    // Create new user in database

    $db->query('INSERT INTO users(username, email, pwd) VALUES(:username, :email, :pwd)', [
        'username' => $username,
        'email' => $email,
        'pwd' => password_hash($pwd, PASSWORD_BCRYPT),
    ]);

    // Create user session variable

    login([
        'id' => $user['id'],
        'username' => $user['username'],
        'email' => $user['email'],
    ]);

    header('Location: /');
    die();
}
