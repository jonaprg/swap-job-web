<?php

class MatchesModel extends Model {

    public function __construct()
    {
        
    }

    public function removeUser($userId, $currentOfferId) {
        error_log("MATCHES::removeUser-> Removing user with ID ".$userId." and offer ".$currentOfferId);
        try {

            $postData = ["offerId" => $currentOfferId, "userId" => $userId];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/removeMatchCompany',
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
}