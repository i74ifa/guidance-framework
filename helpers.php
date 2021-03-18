<?php

use Core\Actions\methodRoute;
use Core\Support\Config;
use function PHPUnit\Framework\returnSelf;

/**
 * config('app.name')
 *
 *
 * count();
 * if > 2;
 * 3
 * $array[][]
 *
 * @param $parameter
 * @return string
 *
 *
 *
 * get name file and index
 * config('app.name') = config/app.php['name'];
 * but if indexed like this config('app.name.name') = config/app.php['name']['name']
 *
 */

function config($parameter)
{
    $app = new Config($parameter);

    return $app->output;
}

function kernel(string $arg, string $key)
{
    $classes = require __DIR__ . '/app/Kernel.php';
    return new $classes[$arg][$key];
}

/**
 * functions for routing
 */

/**
 * getting view with .php  or not
 * the directory views in /Views
 * 
 * @param string $view 
 * 
 * @return string directory for file
 */
function asset(string $view)
{

    $direView = __DIR__ . '/Views/';
    if (strrpos($view, '.php')) {
        return $direView . $view;
    }
    return $direView . $view . '.php';
}

/**
 * view html in view
 * using asset() method
 *
 * @param string $dir
 *
 * @param null $data
 * @return mixed "include" file
 */
function view($dir, $data = null)
{
    if (file_exists(asset($dir)))
        return require asset($dir);
    http_response_code(404);
    return require __DIR__ . '/Views/errors/404.php';
    
}

function passedUri($url)
{
    
    if (strpos($url, '?'))
    {
        $url = explode('?', $url);
        $get = explode('=', $url[1]);
        return ['url' => $url[0], 'get' => $get];
    }

    return $url;
}

function route(string $name)
{
    return new methodRoute;
}


function session($key)
{
    if (isset($_SESSION[$key])) {
        $errors = $_SESSION[$key];
        $_SESSION[$key] = null;
        return $errors;
    } else 
        return false;
}

function is_true($value)
{
    if ($value == TRUE)
        return true;
    else
        return false;
}