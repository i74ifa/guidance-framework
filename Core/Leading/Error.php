<?php
namespace Core\Leading;

/** 
  * Description About Class

*/
class Error
{
    
    /**
     *  Error Key
     * 
     * @var string $key 
     */
    public static string $key;

    /**
     * attribute error
     * 
     * @var string|null $attribute
     */
    public static $attribute;

    public static $type;

    public static function run($key, $attribute = null)
    {

      $error = self::get_attribute($key);
      $attribute = self::explode($error, $attribute);

      return false;
    }

    public static function get_attribute($key)
    {
      $errors = json_decode(file_get_contents(config('app.errors_file')));
      return $errors->validation->$key;
    }

    public static function explode($value, $attribute)
    {
      $value = explode(':attribute', $value);
      $_SESSION['errors'][] =  $value[0] . $attribute . $value[1];

    }
    
    
}