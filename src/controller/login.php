<?php

class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        error_log("LOGIN::render-> Rendering the login index");
        $this->view->render('login/index');
    }

    function authenticate()
    {
        if ($this->existPOST(['username', 'password'])) {
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            //validate data
            if ($username == '' || empty($username) || $password == '' || empty($password)) {
                //$this->errorAtLogin('Campos vacios');
                error_log('Login::authenticate() empty');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_EMPTY]);
                return;
            }
            // si el login es exitoso regresa solo el ID del usuario

            $token = $this->login($username, $password);

            if ($token != NULL) {
                error_log('Login::authenticate() passed');
                $_SESSION['accessToken'] = $token;
                $this->loadCompany();
                header("Location: http://".$_SERVER['HTTP_HOST']);
            } else {
                //error al registrar, que intente de nuevo
                //$this->errorAtLogin('Nombre de usuario y/o password incorrecto');
                error_log('Login::authenticate() username and/or password wrong');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
                header("Location: http://".$_SERVER['HTTP_HOST']);
            }
        } else {
            // error, cargar vista con errores
            //$this->errorAtLogin('Error al procesar solicitud');
            error_log('Login::authenticate() error with params');
            $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
        }
    }

    private function loadCompany()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.swapjob.tk/SwapJob/company',
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

        $_SESSION['company'] = json_decode($response, true);
    }

    public function login($username, $password)
    {
        error_log("login: inicio");
        try {
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

            if (isset($result['accessToken'])) {
                return $result['accessToken'];
            } else {
                return NULL;
            }
        } catch (PDOException $e) {
            return NULL;
        }
    }

}