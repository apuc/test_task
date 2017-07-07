<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 07.07.2017
 * Time: 17:47
 */
use lib\Debug;

include __DIR__ . '/init.php';

$html = new \parser\Html('https://stackoverflow.com');
$html->parseTags();

Debug::prn($html->allTagsCount);
Debug::prn($html->getCustomTag('meta'));
Debug::prn($html->getImg());
Debug::prn($html->getA());
