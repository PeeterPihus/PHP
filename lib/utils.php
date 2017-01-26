<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 26.01.2017
 * Time: 14:29
 */
function fixDb($val){
    return '"'.addslashes($val).'"';
}
?>