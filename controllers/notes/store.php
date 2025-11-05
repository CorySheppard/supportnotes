<?php

use Core\App;
use Core\Database;
use Core\Validator;

new Validator();

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['content'], 5, 1000)) {
    $errors['content'] = 'A note more than 5 characters, but less than 1,000 is required.';
}

if (! Validator::string($_POST['title'], 5, 100)) {
    $errors['title'] = 'A title more than 5 characters, but less than 100 is required.';
}

if (! empty($errors)) {
    return view('notes/create.view.php', [
        'pageTitle' => 'Create a Note',
        'errors' => $errors,
    ]);
}

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $_POST['id'],
])->fetch(); 

$db->query('INSERT INTO notes(username, title, content, users_id) VALUES(:username, :title, :content, :users_id)', [
    'username' => $user['username'],
    'title' => $_POST["title"],
    'content' => $_POST["content"],
    'users_id' => $user['id'],
]);
header("Location: /notes");
die();
