<?php

class View{

    function __construct(){
        // si $session existe
        // render(profile)
        //sino
        // render(login)
    }

    function render($name, $data = []){
        $this->d = $data;
        require 'src/view/' . $name . '.php';
    }


}