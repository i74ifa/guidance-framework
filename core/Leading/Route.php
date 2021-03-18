<?php

namespace Core\Leading;

use Core\Support\_Array;
use Exception;

/** 
  * Description About Class

*/
class Route
{
    public static $methods_routes;
    protected $middle;
    protected $name_route;
    public function __construct($name)
    {
        
    }
    public function name($name)
    {
        $this->name_route = $name;
        return $this;
    }

    public function middleware($middle)
    {
        if (is_array($middle))
        {
            return new _Array($middle);
        }
        $this->middle = $middle;
        return $this;
    }

    public function __destruct()
    {
        self::$methods_routes[] = [
            'name' => $this->name_route,
            'middleware' => $this->middle
        ];
    }
    
}