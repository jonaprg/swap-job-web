<?php
class Signup extends Controller{

    function __construct(){
        parent::__construct();
    }

    function render(){
        error_log("SIGNUP::render-> Rendering the sign-up view");
        $this->view->render('sign-up');
    }

}