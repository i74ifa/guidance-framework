<?php

namespace Core\Support;

use Core\Model as CoreModel;

class Model extends CoreModel {

    public $tables = 'd';


    public function __construct()
    {
        return 'Hello';
    }

}