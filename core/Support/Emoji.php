<?php

namespace Core\Support;

/** 
  * Description About Class

*/
class Emoji
{
    
    public const name = [
        'happy' => '🙂',
        'sad' => '🙁',
        'black Heart' => '🖤',
        'Red Heart' => '' ,
        'Broken Heart' => '💔',
        'Green Heart' => '💚',
        'Blue Heart' => '💙',
        'Upside-down Face' => '🙃',
        'Face With Tears Of Joy' => '😂',
        'Kissing' => '😚',
        'Kissing Heart' => '😘',

    ];


    public static function get($name)
    {
        return self::name[$name];
    }

    public static function all()
    {
        return self::name;
    }

    
    
}