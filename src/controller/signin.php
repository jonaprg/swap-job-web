<?php
class Signup extends Controller{

    function __construct(){
        parent::__construct();
    }

    function render(){
        error_log("SIGNIN::render-> Rendering the sign-in view");
        $this->view->render('sign-up');
    }

}