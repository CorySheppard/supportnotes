<?php

use Core\App;
use Core\Database;
use Core\Validator;

new Validator();

$db = App::resolve(Database::class);

$errors = [];

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_GET['id']
])->fetch();

view('notes/edit.view.php', [
    'pageTitle' => 'Edit a Note',
    'errors' => [],
    'note' => $note,
]);