<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

function isUrl($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    view("{$code}.php", [
        "pageTitle" => "Looks like something has gone wrong!",
    ]);

    die();
}

function authorise($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}

function login($user)
{
    $_SESSION['user'] = $user;

    // Regenerate the session
    session_regenerate_id(true);
}

function logout()
{
    // Clear the session data, and destroy it
    $_SESSION = [];
    session_destroy();

    // Set the existing session cookie to expire
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}