<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 12.01.2017
 * Time: 12:58
 */
// import configuration
require_once 'conf.php';
// create an template object,
// set up the file name for template
// load template file content
$tmpl = new template('main');
require_once(BASE_DIR.'lang.php');
$tmpl->set('style', STYLE_DIR.'main'.'css');
$tmpl->set('header', 'minu lehe pealkiri');
require_once 'menu.php';
$tmpl->set('menu', $menu->parse());
require_once 'act.php';
$tmpl->('nav_bar', $sess->user_uata['username']);
$tmpl->set('lang_bar', LANG_ID);
//$tmpl->set('content', 'minu sisu');
// output template content set up with real values
echo $tmpl->parse();
// control actions

// control database object
// create test query
$sql = 'SELECT NOW();';
$res = $db->getArray($sql);
$sql = 'SELECT NOW();';
$res = $db->getArray($sql);
$sql = 'SELECT NOW();';
$res = $db->getArray($sql);
// control database query result
$sess->flush();
// query time control
$db->showHistory();
// control session output
$sess->flush();
print_r($sess);
?>