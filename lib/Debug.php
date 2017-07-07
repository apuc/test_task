<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 03.06.2017
 * Time: 13:19
 */

namespace lib;

class Debug
{

    public static function prn($content)
    {
        echo '<pre style="background: lightgray; border: 1px solid black; padding: 2px">';
        print_r($content);
        echo '</pre>';
    }

}