<?php

namespace Core\Leading;

/** 
  * Description About Class

*/
class Allocation
{
    
    public static $args;

    public static function App($name, $action)
    {
        self::$args[] = $name;
        return new \Core\Leading\Route('');
    }

    public static function all()
    {
        return new \Core\Leading\Route('');
    }
    
    
}