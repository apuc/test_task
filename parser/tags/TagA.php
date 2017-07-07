<?php

namespace parser\tags;

use lib\Debug;
use parser\Tag;

/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 07.07.2017
 * Time: 10:59
 */
class TagA implements Tag
{

    /**
     * @param $file
     * @return array
     * Шаблон для работы с тегом
     */
    public function getTag($file)
    {
        $tpl = '|<a.*(?=href=\"([^\"]*)\")[^>]*>([^<]*)</a>|i';
        preg_match_all($tpl, $file, $matches,PREG_SET_ORDER);
        $i=0;
        $links = [];
        foreach ($matches as $link){
            $links[$i]['anchor'] = $link[2];
            $links[$i]['link'] = $link[1];
            $i++;
        }
        return [
            'tag' => 'a',
            'count' => $i,
            'attr' => $links
        ];
    }
}