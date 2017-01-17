<?php

/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 17.01.2017
 * Time: 12:48
 */
class http
{//http being
    //class variable
    var $server = array(); //server data
    var $vars = array(); //http data
    var $cookie = array(); //cookie data
    //class methods
    //construct
    //object creation and initialization by init() and initConst() methods
    function __construct(){
        $this->init();
        $this->initConst();
    }//__construct

    // initialize class variables
    function init() {
        $this->server = $_SERVER; // server real data
        $this->cookie = $_COOKIE; // cookie real data
        $this->vars = array_merge($_GET, $_POST, $_FILES); //http real data
    }// init
    // initialize class constants
    function initConst(){
        $vars = array('REMOTE_ADDR', 'PHP_SELF', 'SCRIPT_NAME', 'HTTP_POST');
        foreach($vars as $var){
            if(!defined($var) and isset($this->server[$var])){
                define($var, $this->server[$var]);
            }
        }
    }//initConst
    //set up data for http object
    function set($name, $val){
        $this->vars[$name] = $val;
    }//set
}//http end