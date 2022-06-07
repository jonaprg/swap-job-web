<?php

class List_offer extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        error_log("LIST_OFFER::render-> Rendering the list_offer");
        $_SESSION['currentId'] = $_GET['offerId'];
        error_log("LIST_OFFER::render-> The current offerId is " . $_SESSION['currentId']);
        $this->view->render('list_offer');
    }

    function disable()
    {
        $this->model->disable_offer();
        $this->loadCompany();
        header("Location: http://".$_SERVER['HTTP_HOST']);
    }
    function finalize()
    {
        $this->model->finalize_offer();
        $this->loadCompany();
        header("Location: http://".$_SERVER['HTTP_HOST']);
    }

    private function loadCompany()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/company',
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
        curl_close($curl);

        $_SESSION['company'] = json_decode($response, true);
    }
}