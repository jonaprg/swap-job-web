<?php

class New_offerModel extends Model
{

    function __construct()
    {

    }

    public function new_offer($title, $description, $salary, $isRemote, $isVisible, $labour, $skillList, $invalid, $valid)
    {
        error_log("new_offer: inicio");
        try {

            $postData = ["title" => $title,
                "description" => $description,
                "salary" => (int) $salary,
                "remote" => $isRemote,
                "visible" => $isVisible,
                "labour" => (int) $labour,
                "skillList" => $skillList,
            ];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/offer/new',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postData),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$_SESSION["accessToken"],
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);


        } catch (PDOException $e) {
            error_log("new_offer: ERROR");
        }
    }

    public function get_skills(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/skill/all',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION["accessToken"]
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response, true);

    }
}