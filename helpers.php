<?php

use Core\Actions\methodRoute;

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
 * @param string $value
 * 
 * @return string
 */
function config(string $value)
{
    $array = explode('.', $value);
    $dir = __DIR__ . '/config/' . $array[0] . '.php';
    $ars = '';

    // foreach ($array as $ar)
    // {
    //     $ars .= "[$ar]";
    // }
    if (file_exists($dir))
    {
        $files = include __DIR__ . '/config/' . $array[0] . '.php';
        return $files[$array[1]];
    }    
    return null;
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
 * @return include file
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
        return;
}

function is_true($value)
{
    if ($value == TRUE)
        return true;
    else
        return false;
}