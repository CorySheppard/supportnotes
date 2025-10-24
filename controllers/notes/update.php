<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

// Fetch the note

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
])->fetch();

// Validate new inputs

if (! Validator::string($_POST['content'], 5, 1000)) {
    $errors['content'] = 'A note more than 5 characters, but less than 1,000 is required.';
}

if (! Validator::string($_POST['title'], 5, 100)) {
    $errors['title'] = 'A title more than 5 characters, but less than 100 is required.';
}

// If there are errors, return to update page w/ errors

if (! empty($errors)) {
    return view('notes/edit.view.php', [
        'pageTitle' => 'Edit a Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

// Update the note, if no errors

$db->query('UPDATE notes SET title = :title, content = :content WHERE id = :id', [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'content' => $_POST['content'],
]);
header("Location: /notes");
die();
