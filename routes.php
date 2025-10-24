<?php

$router->get('/', 'controllers/index.php');

// View Notes
$router->get('/notes', 'controllers/notes/index.php')->only('auth');

// View Create Note Form, Create New Note
$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php')->only('auth');

// View Edit Note Form, Edit Existing Note
$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');
$router->patch('/notes', 'controllers/notes/update.php')->only('auth');

// Delete Note
$router->delete('/notes', 'controllers/notes/destroy.php')->only('auth');

// View Registration Form, Create New User
// $router->get('/register', 'controllers/registration/create.php')->only('guest');
// $router->post('/register', 'controllers/registration/store.php')->only('guest');

// View Sign In Form, Sign In User
$router->get('/login', 'controllers/sessions/create.php')->only('guest');
$router->post('/login', 'controllers/sessions/store.php')->only('guest');

// Sign User Out
$router->delete('/logout', 'controllers/sessions/destroy.php')->only('auth');
