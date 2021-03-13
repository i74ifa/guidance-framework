<?php

namespace Core;

use Core\Actions\Query;
use Database\Connect;
use Database\DB;

/** 
 * Description About Class

 */
abstract class Model
{
  /**
   * name table
   * 
   */
  protected $table;
  /**
   * Primary Key
   * 
   * @var string $primaryKey
   */
  protected $primaryKey = 'id';

  /**
   * Unique Key
   * 
   * @var false or `string`
   */
  protected $uniqueKey = false;

  /**
   * Enable or disable Auto Increment id 
   * 
   * @var true
   */
  protected $autoIncrement = true;


  /**
   * what is fillable on insert and what is not
   * 
   * @var array Columns
   */

  protected $fillable = [
    'username', 'email', 'name'
  ];

  /**
   * all Column query on find
   * 
   * @var string Columns
   */
  protected const getting = 'id, name, username, email';
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
    $getting = self::getting;
    self::$user = $db->query("SELECT $getting FROM users where id = $id LIMIT 1");

    return new \App\Models\User;
  }

  /**
   * first user on table `table`
   * 
   * @return string user
   */
  public static function first()
  {
    $db = new DB;
    $getting = self::getting;
    return $db->query("SELECT $getting FROM users LIMIT 1");
  }


  public function __call($name, $arg)
  {
    return self::$user[0][$name];
  }
}
