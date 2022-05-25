<?php

class Signup extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        error_log("SIGNUP::render-> Rendering the sign-up view");
        $this->view->render('sign-up');
    }

    function register()
    {
        if ($this->existPOST(['email', 'password', 'company', 'coordinates', 'description', 'postal'])) {
            $email = $this->getPost('email');
            $password = $this->getPost('password');
            $company = $this->getPost('company');
            $coordinates = $this->getPost('coordinates');
            $description = $this->getPost('description');
            $postal = $this->getPost('postal');
            $visible = true;

            //check field by field if they are empty
            if (empty($email) || empty($password) || empty($company) || empty($coordinates) || empty($description) || empty($postal)) {
                error_log('Register:: data must be filled');
                $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE_DATA]);
                return;
            }

            $success = $this->model->register($email, $password, $company, $coordinates, $description, $postal, $visible);

            if ($success) {
                // inicializa el proceso de las sesiones
                $this->view->render('login');
            } else {
                //error al registrar, que intente de nuevo
                //$this->errorAtLogin('Nombre de usuario y/o password incorrecto');
                error_log('Register::authenticate() field errors');
                $this->view->render('signup');
            }
        } else {
            // error, cargar vista con errores
            //$this->errorAtLogin('Error al procesar solicitud');
            error_log('Login::authenticate() error with params');
            $this->view->render('login');
        }
    }

}