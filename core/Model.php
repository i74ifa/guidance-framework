<?php

namespace Core;


use Database\DB;


/** 
 * Description About Class
 * 
 * Abstract Model  

 */
abstract class Model
{
  protected static $name;
  /**
   * name table
   * 
   */
  protected static $table;
  /**
   * Primary Key
   * 
   * @var string $primaryKey
   */
  protected static $primaryKey = 'id';

  /**
   * Unique Key
   * 
   * @var false or `string`
   */
  protected static $uniqueKey = false;

  /**
   * Enable or disable Auto Increment id 
   * 
   * @var true
   */
  protected static $autoIncrement = true;


  /**
   * what is fillable on insert and what is not
   * 
   * @var array Columns
   */

  protected static $fillable = [
    'email', 'name'
  ];

  /**
   * all Column query on find
   * 
   * @var string Columns
   */
  protected static $getting = '*';
  /**
   * find user by id
   * 
   * @param int $id
   * 
   * @return array values 
   */

   protected static $user;



  public static function find(int $id)
  {
    $db = new DB;
    $getting = static::$getting;
    $table = static::$table;

    return $db->query("SELECT $getting FROM $table where id = $id LIMIT 1");
  }

  /**
   * first user on table `table`
   * 
   * @return string user
   */
  public static function first()
  {
    $db = new DB;
    $getting = static::$getting;
    $table = static::$table;
    return $db->query("SELECT $getting FROM $table LIMIT 1");
  }


  public function __call($name, $arg) 
  {
    return [$name, $arg];
  }
}
