<?php

namespace App\Middleware;

/** 
  * Description About Class
*/
class Authentication
{

  public function __construct()
  {
    $request = $_REQUEST;
    if (isset($request['name']) && $request['name'] == 'huzifa')
    {
      return http_response_code(200);
    }
    return http_response_code(500);
  }
    
}