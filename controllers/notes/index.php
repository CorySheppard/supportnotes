<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('select * from notes;')->fetchAll();

view('notes/index.view.php', [
    'pageTitle' => 'Notes',
    'notes' => $notes
]);