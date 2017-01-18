<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 18.01.2017
 * Time: 14:25
 */
$act = $http->get('act');
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';
if(file_exists($fn) and is_file($fn) and is_readable($fm)) {
    require_once $fn;
}else {
    $fn = ACTS_DIR.DEFAULT.'.php';
    $http->set('act', DEFAULT_ACT);
    require_once $fn;
}
?>