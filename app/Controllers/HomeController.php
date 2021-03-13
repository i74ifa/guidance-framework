<?php

namespace App\Controllers;

use Core\Controllers;

/** 
 * Description About Class

 */
class HomeController extends Controllers
{
  public function index()
  {
    echo '1';
    return $this->view('s');    
  }
  public function app()
  {
    return $this->view('Good');    
  }
}

