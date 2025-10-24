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

$db->query('INSERT INTO notes(username, title, content) VALUES(:username, :title, :content)', [
    'username' => 'Cory Sheppard',
    'title' => $_POST["title"],
    'content' => $_POST["content"],
]);
header("Location: /notes");
die();
