<?php

class SignOut extends Controller
{

    function __construct()
    {
        error_log("SIGNOUT::__construct-> Signing out");
        $this->loadModel('signout');
        $this->model->signout();
    }
}