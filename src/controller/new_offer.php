<?php

class new_offer extends Controller
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

            $this->model->new_offer($title, $description, $salary, $isRemote, $isVisible, $labour, $skillList, $invalid, $valid);
        }
    }

}