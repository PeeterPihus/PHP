<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 30.01.2017
 * Time: 12:21
 */
$form = new Temaplate('login');
$form->set('error', $sess->get('login_error'));
$sess->del('login_Error');
$form->set('submit', tr('Logi sisse'));
$form->set('username_str', tr('Kasutajanimi'));
$form->set('password_Str', tr('Parool'));
$form->set('username', $http->get('username', true));
$link = htp->getLink(array('act' => 'login_do'));
$form->set('action', $link);
$tmpl->set('content', $form->parse());
?>