<?php

class SignoutModel
{

    function __construct()
    {

    }

    function signout()
    {
        unset($_SESSION['company']);
        unset($_SESSION['accessToken']);
        header("Location: http://".$_SERVER['HTTP_HOST']);
    }
}