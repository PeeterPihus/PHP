<?php

/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 18.01.2017
 * Time: 8:48
 */
// useful class for this class
// useful function for this class
function fixUrl($val) {
    return urldecode($val);
} // fixUrl
// only for testing
// import http class
require_once 'http.php';
// only for testing
class linkobject extends http
{ // class begin
    // class variables
    var $baseUrl = false; // base URL
    var $protocol = 'http://'; // protocol for URL - http
    var $delim = '&amp;'; // & html tag name1=value1&name2=value2
    var $eq = '='; // = for URL element pair element_name = element_value
    // add if exists
    var $aie = array('lang_id','sid'=>'sid');
    // class methods to help to make the url link
    // construct
    // create base URL: http//XXX.XXX.XXX.XXX/path_to_file.php
    function __construct() {
        parent::__construct();
        $this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    } // construct
    // create http data pairs and merge them
    // merge is realized by &$link
    function addToLink(&$link, $name, $val) {
        // if link is not empty - pair is created
        if($link !='') {
            $link .= $this->delim; // $link .= $this->delim;
        }
        // create pair: element_name = element_value
        $link = $link.fixUrl($name).$this->eq.fixUrl($val);
    }// addTo link
    // merge baseUrl an dlink with  data pairs
    /**
     * @param array $add
     * @return bool|string
     */
    function getLink($add = array(), $aie = array(), $not = array()) {
        $link = '';
        foreach ($add as $name => $val) {
            $this->addToLink($link, $name, $val);
        }
        foreach ($aie as $name){
            $val = $this->get($name);
            if ($val !== false){
                $this->addToLink($link, $name, $val);
            }
        }
        foreach ($this->aie as $name){
            $val = $this->get($name);
            if ($val !== false and !in_array($name, $not)){
                $this->addToLink($link, $name, $val);
            }
        }
        // control if link is not empty
        if($link !='') {
            $link = $this->baseUrl.'?'.$link; // http://IP/path_to_script.php?name=value
        }
        else {
            $link = $this->baseUrl;
        }
        return $link; // return created link to base program
    } // getLink
} // class end
?>