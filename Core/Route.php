<?php

namespace Core;

use Closure;
use Core\Actions\methodRoute;

/** 
 * Description About Class

 */
class Route
{
    use \Core\Core;
    public static $routes = [];
    public static $route;
    public static $all;
    public static $success = false;

    /**
     * 
     * add get Request 
     * 
     * @param string $route url route
     * @param string or string $view Class and name method
     * 
     * @return \Core\Actions\methodRoute
     * 
     */
    public static function get(string $route, array $action, $data)
    {
        self::$routes[] = [
            'route' => $route,
            'view' => $action,
            'method' => 'get',
            'name' => $action[2],
            'data' => $data
        ];
        if (!self::$success) {
            self::routing();
        }

        return new methodRoute;
    }
    /**
     * 
     * add post Request 
     * 
     * @param string $route url route
     * @param string or string $action Class and name method
     * 
     * @return \Core\Actions\methodRoute
     * 
     */
    public static function post(string $route, array $action)
    {
        self::$routes[] = ['route' => $route, 'view' => $action, 'method' => 'post', 'name' => $action[2]];
        if (!self::$success) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
                self::routing();
        }
        // if (self::is_closure($closure))
        // {
        //     $closure->__invoke();
        // }
        return new methodRoute;
    }
    /**
     * run all routes for request 
     */
    public static function routing()
    {
        foreach (self::$routes as $key => $route) {
            if ($_SERVER['REQUEST_URI'] == '/' . passedUri($route['route'])) {
                if ($_SERVER['REQUEST_METHOD'] == strtoupper($route['method'])) {
                    self::$route = $_SERVER['REQUEST_URI'];
                    self::$success = true;
                    view($route['view'][1], $route['data']);
                }
            }
        }
    }
    /**
     * if parameter is closure or not
     * 
     * @param mixed $closure or !=
     * 
     * @return bool
     */
    protected static function is_closure($closure)
    {
        return $closure instanceof Closure;
    }

    /**
     * get name to route 
     * 
     * @param string $name
     * 
     * @return \Core\Actions\nameRoute
     */
    public static function name(string $name)
    {
        return methodRoute::name($name);
    }
    public static function all()
    {
        $routes = [];
        foreach (self::$routes as $route) {
            $routes[] = [
                'route' => $route['route'],
                'method' => $route['method'],
                'name' => $route['name'],
            ];
        }
        return $routes;
    }
}
