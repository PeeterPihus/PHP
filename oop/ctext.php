<?php

/**
 * Created by PhpStorm.
 * User: Peeter
 * Date: 11.01.2017
 * Time: 15:14
 */
//allow to use text class in ctext class
require_once('text.php');
class ctext extends text
{//ctext begin
    //class variable
    var $color = false;
    //methods
    //set color
    function setColor($c) {
        $this->color = $c;
    }//setcolor
    //show color text
    function show()
    {
        if($this->color === false){
            parent::show();//use text class show fucntion
        }else {
            echo'<font color="'.$this->color.'">'.$this->str.'</font></br> 
        }
    }// show
}//ctext end
?>