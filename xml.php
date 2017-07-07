<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 07.07.2017
 * Time: 15:58
 */

include __DIR__ . '/init.php';

$html = new \parser\Html('https://stackoverflow.com');
$html->parseTags();
$html->responseXml();