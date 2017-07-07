<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 06.07.2017
 * Time: 13:57
 */

namespace parser;

use lib\Debug;
use SimpleXMLElement;

class Parser
{
    public $file;
    public $fileLink;
    public $result;

    public function __construct($file = null)
    {

        if ($file !== null) {
            $this->load($file);
        }

    }

    /**
     * @param $file
     */
    public function load($file)
    {
        if (file_exists($file)) {
            $this->file = file_get_contents($file);
        } elseif (filter_var($file, FILTER_VALIDATE_URL)) {
            $this->file = file_get_contents($file);
        } elseif (is_string($file)) {
            $this->file = $file;
        }
    }

    /**
     * Возвращает результат в виде JSON
     */
    public function responseJson()
    {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($this->result);
    }

    /**
     * Возвращает результат в виде XML
     */
    public function responseXml()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $this->arrayToXml($this->result, $xml);
        header('Content-type: text/xml; charset=utf-8');
        echo $xml->asXML();
    }

    /**
     * @param $data
     * @param $xml_data
     * Переводит массив в XML
     */
    private function arrayToXml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key;
            }
            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

}