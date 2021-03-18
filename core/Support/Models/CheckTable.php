<?php
namespace Core\Support\Models;




abstract class CheckTable {


    protected $format = '.php';

    public function __construct(string $table)
    {
        $table = trim($table, $this->format);
        $table = strtolower($table);
    }

}