<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/user',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS =>'{
    "email":"pako@astapor.com",
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJwYWtvQGFzdGFwb3IuY29tIiwiaWF0IjoxNjUzNDMzMDEzLCJleHAiOjE2NTM1MTk0MTN9._toV0Vx50IrUZB0_lFY1o--sToSg6_jNO236phvg-F30veqeuWWqZGMNp_x2zc9yDHYhLby3j9Mj-XngeKXScg',
    'Content-Type: text/plain'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;