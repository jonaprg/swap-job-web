<?php

class ProfileController extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function render(){
        error_log("LOGIN::render-> Rendering the profile index");
        $this->view->render('profile');
    }

}