<?php

class List_offerModel extends Model
{

    function __construct()
    {

    }

    public function disable_offer()
    {
        error_log("LIST_OFFER::disable_offer-> Deleting offer " . $_SESSION['currentId']);
        try {

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
                CURLOPT_POSTFIELDS => $_SESSION['currentId'],
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
    public function finalize_offer()
    {
        error_log("LIST_OFFER::finalize_offer-> Closing offer " . $_SESSION['currentId']);
        try {

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/offer/finalize',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $_SESSION['currentId'],
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