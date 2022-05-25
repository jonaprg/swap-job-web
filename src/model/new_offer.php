<?php

class LoginModel extends Model
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
                "salary" => $salary,
                "isRemote" => $isRemote,
                "isVisible" => $isVisible,
                "labour" => $labour,
                "skillList" => $skillList,
                "invalid" => $invalid,
                "valid" => $valid,
            ];

            /*
             * "title": "Offer for Pako Company",
                  "description": "C++ and Java experience",
                  "salary": 25000,
                  "isRemote": true,
                  "isVisible": true,
                  "labour": 40,
                  "skillList": [
                    1,2,3,4
                  ],
                  "invalid": true,
                  "valid": true
             * */

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
            return NULL;
        }
    }
}