<?php

class Profile extends Controller
{

    function __construct(){
        parent::__construct();
    }

    function render(){
        error_log("LOGIN::render-> Rendering the profile index");
        $this->view->render('profile');
    }

    function deleteUser() {
        $res = $this->deleteCurrentUser();
        if ($res) {
            unset($_SESSION['company']);
            unset($_SESSION['accessToken']);
            unset($_SESSION['currentId']);
            header("Location: http://".$_SERVER['HTTP_HOST']);
        }
    }

    function deleteCurrentUser() {
        error_log("PROFILE::deleteCurrentUser-> Deleting user " . $_SESSION['company']['name']);
    
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/user/delete',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' . $_SESSION['accessToken'],
            'Content-Type: application/json'
        ),
        ));
    
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
    
        if ($httpcode == 200) {
            return true;
        } else {
            return false;
        }
    
    }

}