<pre>
<?php

use App\Models\User;

session_start();
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../connect.php';
require_once __DIR__ . '/../helpers.php';



$ar = [
  'name',
  'app',
  'get'
];


