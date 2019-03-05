<?php

class Dashboard extends Controller{
    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false){
            Session::destroy();
            header('location: ../login');
            exit;
        }
    }
    
    function loadView(){
        $this->view->render('dashboard/index');
    }
    
    function logout(){
        Session::destroy();
        header('location: ../index');
        exit;
    }
    
    function rentBoat(){
          $args = array(
            'cruiseLength' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9]{1,10}$/']],
            'name' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[a-ząśżźćęółń]+\s*(?:[a-ząśżźćęółń]+(?:\s*-\s*)?[a-ząśżźćęółń]+)?$/i']],
            'surname' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[a-ząśżźćęółń]+\s*(?:[a-ząśżźćęółń]+(?:\s*-\s*)?[a-ząśżźćęółń]+)?$/i']],
            'email' => FILTER_VALIDATE_EMAIL
        );

        //przefiltruj dane:
        $dane = filter_input_array(INPUT_POST, $args);

        $errors = "";

        foreach($dane as $key => $val) {
            if($val === false or $val === NULL) {
                $errors .=$key ." ";
            }   
        }

        if ($errors === "") {
           $this->model->rentBoat();
        } else { 
           Session::init();
           Session::set('err', true);
           header('location: http://localhost/projectMVC/dashboard');       
        }
    }
}
