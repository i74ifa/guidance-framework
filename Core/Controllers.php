<?php

namespace Core;

/** 
  * Description About Class

*/
abstract class Controllers
{
    
    protected $middleware;
    protected $validate;

    public function view($name)
    {
        return 'The View name is ' . $name;
    }
    
    
}