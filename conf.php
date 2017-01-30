<?php
/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 19.01.2017
 * Time: 12:19
 */
// define constants
define('CLASSES_DIR', 'classes/');
define('TMPL_DIR', 'tmpl/');
define('STYLE_DIR', 'css/');
define('ACTS_DIR', 'acts/'); // default act directory
define('LIB_DIR', 'lib/'); // useful functions directory
define('DEFAULT_ACT', 'default'); // default act file name
define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);
// import useful files
require_once LIB_DIR.'utils.php';
// import classes
require_once CLASSES_DIR.'template.php'; // import template class file
require_once CLASSES_DIR.'http.php'; // import http class file
require_once CLASSES_DIR.'linkobject.php'; // import linkobject file
require_once CLASSES_DIR.'mysql.php'; // import database class file
require_once CLASSES_DIR.'session.php'; // import session class file
// import database configuration
require_once 'db_conf.php';
// objects
// create linkobject object, because it extends http object
$http = new linkobject();
// create database class object with real values
$db = new mysql(DBHOST, DBUSER, DBPASS, DBNAME);
// create session class object
$sess = new session($http, $db);

?>