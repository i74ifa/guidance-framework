<?php

namespace Core\Leading;

use Exception;
use Core\Leading\Error;
/** 
 * Description About Class
 */
class Validate
{
    /**
     * validates [
     * - string 
     * - integer 
     * - null 
     * - not null 
     * - email 
     * - uppercase 
     * - lowercase 
     * ]
     * 
     * - string or array 
     * if string 'string|not_null|email' and split by | 
     * if array use implode and convert to string 
     */
    protected $type = [
        'string',
        'integer',
        'null',
        'not_null',
        'email',
    ];

    /**
     * data from form or array
     * @var array 
     */
    public $data = [];

    /**
     * actions validates and name keys array data
     * 
     * @var array $validates
     */
    protected $validates;

    /**
     * validate value 
     * 
     * @param array $valid
     * @param array $actions
     * @return $this;
     */
    public function __construct(array $data, array $actions)
    {

        $this->data = $data;
        $this->validates = $actions;

        if (is_array($data))
            $this->explode();
        else
            throw new Exception('Validate is null');
    }

    /**
     * getting data and explode 
     */
    protected function explode()
    {
        $validates = [];
        foreach ($this->validates as $key => $item) {
            if (is_string($item))
                $item = $this->is_string($item);

            $validates[$key] = $item;
        }
        $this->validates = $validates;
        $this->valid();
    }

    protected function is_string($value)
    {
        return explode('|', $value);
    }

    public function string($data, $key = null)
    {
        if (is_string($data) && $data)
            return $data;
        return Error::run('string', $key);
    }

    public function integer($data, $key = null)
    {
        if (is_int($data))
            return $data;

        return Error::run('integer', $key);
    }

    public function email($data, $key = null)
    {
        if (strpos($data, '@'))
            return $data;

            return Error::run('email', $key);
    }
    public function valid()
    {
        $data = array();

        foreach ($this->validates as $key => $item) {
            foreach ($item as $valid) {
                if (method_exists(Validate::class, $valid)) {
                    if ($this->$valid($this->data[$key], $key) == $this->data[$key])
                        $data[$key] = $this->$valid($this->data[$key]);
                } else
                    throw new Exception("$valid does not exist validation");
            }
        }
        // Delete this line if you return all data 
        $this->data = $data;
        return $this->data;
    }

    public function __destruct()
    {
        $_SESSION['errors'] = null;
    }
}
