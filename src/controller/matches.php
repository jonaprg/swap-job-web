<?php

class Matches extends Controller
{

    function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['company']['matches'])){
            $this->loadMatches();
        }
    }

    function render()
    {
        error_log("Matches::render-> Rendering the matches");
        $this->view->render('matches');
    }

    private function loadMatches()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/company/matches',
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

        $_SESSION['company']['matches'] = json_decode($response, true);
    }
}