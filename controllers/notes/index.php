<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Check if there's a "search" parameter

if (isset($_GET["search"])) {
    $search = $_GET["search"];

    // If so, return notes from database where title/content are like search

    $notes = $db->query("SELECT * FROM notes WHERE title LIKE :search OR content LIKE :search", [
        "search" => "%{$search}%"
    ])->fetchAll();
} else {

    // Otherwise, return all notes from database

    $notes = $db->query("SELECT * FROM notes")->fetchAll();
}

view('notes/index.view.php', [
    'pageTitle' => 'Notes',
    'notes' => $notes
]);