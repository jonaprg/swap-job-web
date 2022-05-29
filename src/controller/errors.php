<?php

class Errors extends Controller{

    const ERROR_LOGIN_AUTHENTICATE_DATA = 1;
    const ERROR_LOGIN_AUTHENTICATE_EMPTY = 2;
    const ERROR_LOGIN_AUTHENTICATE = 3;

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('errors/index');
    }
}
