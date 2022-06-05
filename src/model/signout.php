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
        unset($_SESSION['currentId']);
        header("Location: http://".$_SERVER['HTTP_HOST']);
    }
}