<?php

class View{

    function __construct(){

    }

    function render($name, $data = []){
        $this->d = $data;

        require 'src/view/' . $name . '.php';
    }


}