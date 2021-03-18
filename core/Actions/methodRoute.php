<?php

namespace Core\Actions;

/** 
 * Description About Class

 */ 
class methodRoute
{
  public $name;
  public $middleware = [];
  public function name($name)
  {
    $this->name = $name;
    return $this;
  }

  public function middleware(array $list)
  {
    $this->middleware = $list;
    return $this;
  }

  public function __destruct()
  {
    foreach ($this->middleware as $middle) {
      kernel('Middleware', $middle);
    }
  }
}
