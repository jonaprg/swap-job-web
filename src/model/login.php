<?php

class LoginModel extends Model{

    function __construct(){
        
    }

    public function login($username, $password){
        // insertar datos en la BD
        error_log("login: inicio");
        try{
            $curl = curl_init();
            $postData = ["email" => $username,
                "password" => $password,
            ];
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/auth/signin',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($postData),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);
            $result = json_decode($response, true);
            curl_close($curl);

            if (isset($result['accessToken'])){
                return $result['id'];
            }else{
                return NULL;
            }
        }catch(PDOException $e){
            return NULL;
        }
    }
}