<?php

namespace Database;

use PDO;

/** 
  * Description About Class

*/
class Connect
{

    private $host;
    private $user;
    private $pass;
    private $db;
    private $type;
    public $pdo;

    public function __construct()
    {
        $this->host = config('database.host');
        $this->user = config('database.username');
        $this->pass = config('database.password');
        $this->db = config('database.database');
        $this->type = config('database.type');
        $this->pdo = new PDO($this->type . ':host='. $this->host . ';dbname=' . $this->db, $this->user, $this->pass);
    }
  
}