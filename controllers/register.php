<?php
class Register extends Controller{
    function __construct() {
        parent::__construct();
    }
    
    function loadView(){
        $this->view->render('register/index');
    }
    
    public function inputData(){
        $args = array(
            'login' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A_Za-ząęłńśćźżó_-]{2,25}$/']],
            'password' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A_Za-ząęłńśćźżó_-]{8,}$/']],
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
            $this->model->inputData();
        } else { 
            Session::init();
            Session::set("err", true);
            header('location: ../register');       
        }
        
    }
}
