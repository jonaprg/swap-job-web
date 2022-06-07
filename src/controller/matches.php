<?php

class Matches extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        error_log("Matches::render-> Rendering the matches");
        $this->loadMatches();
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

        $matches = json_decode($response, true);

        foreach ($matches as &$match) {
            foreach ($match['userList'] as &$user) {
                $pathCVFile = "/var/www/html/pdf/" . $user['id'] . '_cv.pdf';
                $pathTitleFile = "/var/www/html/pdf/" . $user['id'] . '_title.pdf';

                if (file_exists($pathCVFile)) {
                    $user['cvPath'] = "https://swapjob.tk/pdf/". $user['id'] . '_cv.pdf';
                }

                if (file_exists($pathTitleFile)) {
                    $user['titlePath'] = "https://swapjob.tk/pdf/". $user['id'] . '_title.pdf';
                }
            }
        }

        $_SESSION['company']['matches'] = $matches;
    }

    function removeUser(){
        $currentOfferId = $_GET['currentOfferId'];
        $userId = $_GET['userId'];
        if(isset($currentOfferId) && isset($userId)) {
            $this->loadModel('mathces');
            $this->model->removeUser($userId, $currentOfferId);
            $this->loadMatches();
            header("Location: http://".$_SERVER['HTTP_HOST']."/matches");
        }
    }
}