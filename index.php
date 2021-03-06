<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 12.01.2017
 * Time: 12:58
 */
// import configuration
require_once 'conf.php';
// create an empty template object
$tmpl = new template('main');
// require language control
require_once 'lang.php';
//add pair of template element names and real values
$tmpl->set('style', STYLE_DIR.'style.css');
$tmpl->set('header', 'minu lehe pealkiri');
// create and output menu
//  import menu file
require_once 'menu.php';
$tmpl->set('menu', $menu->parse());
//$tmpl->set('nav_bar', 'minu navigatsioon');
// control actions
// import act
require_once 'act.php';
// allow to use user data
$tmpl->set('nav_bar', $sess->user_data['username']);
//$tmpl->set('lang_bar', LANG_ID);
//$tmpl->set('lang_bar', 'minu keeleriba');
// $tmpl->set('content', 'minu sisu');
// allow to use default act
//$tmpl->set('content', $http->get('content'));
echo $tmpl->parse();
// control http constants
echo REMOTE_ADDR.'<br />';
echo PHP_SELF.'<br />';
echo SCRIPT_NAME.'<br />';
echo HTTP_HOST.'<br />';
echo '<hr />';
// create http data pairs and set up into $http->vars array
$http->set('kasutaja', 'Peeter');
$http->set('tund', 'php programmeerimisvahendid');
// control $http->vars output
/*echo '<pre>';
print_r($http->vars);
echo '<pre>';*/
// control link creation
$link = $http->getLink(array('kasutaja'=>'Peeter', 'parool'=>'qwerty'));
// echo $link.'<br />';
// control database object
// create test query
$sql = 'select now();';
$res = $db->getArray($sql);
$sql = 'select now();';
$res = $db->getArray($sql);
// control database query
echo '<pre>';
print_r($res);
echo '<pre>';
// session update on the main page
$sess->flush();
// query time control
$db->showHistory();
// control session output
echo '<pre>';
print_r($sess);
echo '<pre>';
?>