<?php

class List_offer extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        error_log("LIST_OFFER::render-> Rendering the list_offer");
        $_SESSION['currentId'] = $_GET['offerId'];
        error_log("LIST_OFFER::render-> The current offerId is " . $_SESSION['currentId']);
        $this->view->render('list_offer');
    }

    function delete()
    {
        $this->model->delete_offer();
        header("Location: http://".$_SERVER['HTTP_HOST']);
    }
}