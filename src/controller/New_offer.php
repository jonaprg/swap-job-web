<?php

class New_offer extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function render(){
        error_log("LOGIN::render-> Rendering the login index");
        $this->view->render('New_offer');
    }

}