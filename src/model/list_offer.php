<?php

class List_offerModel extends Model
{

    function __construct()
    {

    }

    public function delete_offer()
    {
        error_log("LIST_OFFER::delete_offer-> Deleting offer " . $_SESSION['currentId']);
        try {

            $postData = ["id" => $_SESSION['currentId']];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/offer/disable',
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
            error_log("LIST_OFFER::delete_offer-> ERROR: " . $e);
        }
    }
}