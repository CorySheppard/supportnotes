<?php

use Core\App;
use Core\Database;
use Core\Validator;

// Create new database instance

$db = App::resolve(Database::class);

// Store the form inputs

$email = $_POST['email'];
$pwd = $_POST['password'];

// Validate form inputs

$errors = [];

// Validate email

if (! Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

//Validate password

if (! Validator::string($pwd)) {
    $errors['password'] = 'Incorrect password, please try again!';
}

// Check if there are any errors from validation

if (! empty($errors)) {
    return view('sessions/create.view.php', [
        'errors' => $errors,
    ]);
}

// Attempt to fetch user from database

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email,
])->fetch();

// Check if user is found

if ($user) {

    // Check if the email and password match

    if (password_verify($pwd, $user['pwd'])) {

        // Create user session variable (log the user in)

        login([
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
        ]);

        // Redirect the user to the notes page

        header("Location: /notes");
        die();
    }
}

// If the user isn't found, throw an error!

return view('sessions/create.view.php', [
    'errors' => [
        'password' => "Incorrect username or password, please try again!",
    ],
]);