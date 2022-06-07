<?php

class New_offer extends Controller
{

    function __construct(){
        parent::__construct();
        $this->loadModel("new_offer");

        $this->skills = $this->model->get_skills();
    }

    function render(){
        error_log("LOGIN::render-> Rendering the login index");
        $this->view->render('new_offer', $this->skills);
    }

    function create()
    {
        //$title, $description, $salary, $isRemote, $isVisible, $labour, $skillList, $invalid, $valid
        if ($this->existPOST(['salary', 'labour', 'skillList'])) {
            $title = $this->getPost('title');
            $description = $this->getPost('description');
            $salary = $this->getPost('salary');
            $isRemote = $this->getPost('isRemote') == "true";
            $isVisible = true;
            $labour = $this->getPost('labour');

            $aux = $this->getPost('skillList');
            $aux = explode(",",$aux[0]);
            $skillList = [];
            foreach ($aux as $el){
                array_push($skillList,(int)$el);
            }

            ;
            $invalid = true;
            $valid = true;

            $this->loadModel("new_offer");
            $this->model->new_offer($title, $description, $salary, $isRemote, $isVisible, $labour, $skillList, $invalid, $valid);
            $this->loadCompany();
            header("Location: http://".$_SERVER['HTTP_HOST']);
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

}