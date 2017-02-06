<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 30.01.2017
 * Time: 12:29
 */
$username = $http->get('username');
$password = $http->get('password');
$sql = 'SELECT * FROM user WHERE '.'username='.fixDb($username).' AND '.'password='.fixDb(md5($password)). 'AND '.'is_active=1';
$res = $db->getArray($sql);
if($ress === false)
{
    $sess->get('login_error', tr('Viga sisselogimisel'));
    $link = $http->getLink(array('act'=>'login'), array('username'));
    $http->redirect($link);
}
else
{
    $sess->createSession($res[0]);
}
?>