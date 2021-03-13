<?php

namespace Database;

use Core\Actions\find;
use Database\Connect;
use PDO;
class DB extends Connect
{
    /**
     * Simple Query from database
     * 
     * @param  string $query 
     * 
     * @return array 
     */
    public function query(string $query)
    {
        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}