<?php

class SignupModel
{

    function __construct()
    {

    }

    public function register($email, $password, $company, $coordinates, $description, $postal, $visible)
    {
        error_log("registro: inicio");
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/company/new',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
  "name": "' . $company . '",
  "coordinates": "' . $coordinates . '",
  "email": "' . $email . '",
  "imageUrl": "https://swapjob.tk/media/profile_images/default.png",
  "description": "' . $description . '",
  "password": "' . $password . '",
  "postalCode": ' . $postal . ',
  "visible": true
}',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            curl_exec($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if ($httpcode == 200) {
                error_log("registro: ok");
                return true;
            } else {
                error_log("registro: error");
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}