<?php

/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 11.01.2017
 * Time: 14:48
 */
//require the object creating and using class
require_once('text.php');
//create and object
$sentence = new text();
//control  object output
echo'<pre>';
print_r($sentence);
echo'</pre>';
//set text
$sentence->setText('Hello text object!');
//control object output
echo'<pre>';
print_r($sentence);
echo'</pre>';
//show object output
$sentence->show();
//create an object
$sentence2 = new text('Hello text by contructor!');
echo'<pre>';
print_r($sentence2);
echo'</pre>';
$sentence2->show();
?>