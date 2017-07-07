<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 05.07.2017
 * Time: 12:45
 */
include __DIR__ . '/init.php';

$html = new \parser\Html('https://stackoverflow.com');
$html->parseTags();
\lib\Debug::prn($html->result);
