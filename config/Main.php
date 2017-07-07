<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 06.07.2017
 * Time: 17:19
 */

namespace config;

class Main
{

    public static function html()
    {
        return [
            'tagsAttr' => [
                'meta' => ['name', 'content'],
                'div' => ['class'],
                'link' => ['href', 'rel'],
            ]
        ];
    }

}