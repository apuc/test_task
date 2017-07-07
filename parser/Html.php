<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 06.07.2017
 * Time: 14:55
 */

namespace parser;

use config\Main;
use lib\Debug;

class Html extends Parser
{
    public $allTags;
    public $allTagsCount;
    public $images;
    public $links;

    public function load($file)
    {
        parent::load($file); // TODO: Change the autogenerated stub
        $this->parseTagsSimple();
    }

    /**
     * Парсит теги в упрощенном варианте, т.е. название тега и их кол-во.
     */
    public function parseTagsSimple()
    {
        preg_match_all('/<([^\/!][a-z1-9]*)/i', $this->file, $matches);
        $this->allTags = $matches[1];
        $this->allTagsCount = array_count_values($matches[1]);
    }

    /**
     * @return array
     * Получение тега img с необходимыми атрибутами
     */
    public function getImg()
    {
        return $this->images = $this->getCustomTag('img', ['alt', 'src', 'title', 'width', 'height']);
    }

    /**
     * @return array
     * Получение тега a
     */
    public function getA()
    {
        return $this->links = $this->getCustomTag('a');
    }

    /**
     * Парсит все теги
     */
    public function parseTags()
    {
        $result = [];
        foreach ($this->allTagsCount as $key => $item) {
            $tag = $key;
            $result[] = $this->getCustomTag($tag);
        }
        $this->result = $result;
    }

    /**
     * @param $tag
     * @param null $attr
     * @return array
     * Получает определнный тег с его атрибутами, если существует файл для обработки тега, то использует его
     */
    public function getCustomTag($tag, $attr = null)
    {
        if ($fileTagObj = $this->getFileTagObj($tag)) {
            return $fileTagObj->getTag($this->file);
        }
        $tagTpl = '/<' . $tag . '[^>]+>/i';

        preg_match_all($tagTpl, $this->file, $matches);
        if ($attr === null) {
            $attr = isset(Main::html()['tagsAttr'][$tag]) ? Main::html()['tagsAttr'][$tag] : null;
        }
        if ($attr === null) {
            return [
                'tag' => $tag,
                'count' => $this->getTagCount($tag),
            ];
        }
        $attrStr = implode('|', $attr);
        $attrTpl = '/(' . $attrStr . ')=("[^"]*")/i';
        $tags = [];
        $i = 0;
        foreach ($matches[0] as $tg) {
            preg_match_all($attrTpl, $tg, $t);
            foreach ($t[1] as $k => $att) {
                $tags[$i][$att] = $t[2][$k];
            }
            $i++;
        }
        return [
            'tag' => $tag,
            'count' => $i,
            'attr' => $tags,
        ];
    }

    /**
     * @param $tag
     * @return mixed
     * Получает кол-во тегов
     */
    public function getTagCount($tag)
    {
        return $this->allTagsCount[$tag];
    }

    /**
     * @param $tag
     * @return bool|string
     * Проверка на существование файла для обработки тега
     */
    public function issetFileTag($tag)
    {
        $fileTag = 'Tag' . ucfirst($tag);
        if (file_exists(ROOT_DIR . '/parser/tags/' . $fileTag . '.php')) {
            return $fileTag;
        }
        return false;
    }

    /**
     * @param $tag
     * @return bool
     * Получает объект для обработки тега
     */
    public function getFileTagObj($tag)
    {
        if($fileTag = $this->issetFileTag($tag)){
            require_once ROOT_DIR . '/parser/tags/' . $fileTag . '.php';
            $fileTagNamespace = '\parser\tags\\' . $fileTag;
            return new $fileTagNamespace();
        }
        return false;
    }

}