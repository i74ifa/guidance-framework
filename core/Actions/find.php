<?php

namespace Core\Actions;

use Closure;

/** 
  *  Description About Class

*/
class find
{

  public function __construct($val)
  {
    require __DIR__ . '../../../connect.php';
    return $connect->query("SELECT * FROM users WHERE id = $val");
    
  }
    
}