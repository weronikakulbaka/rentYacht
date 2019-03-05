<?php

class Login extends Controller{
    function __construct() {
        parent::__construct();
    }
    
    function loadView(){
        $this->view->render('login/index');
    }
    
    function run(){
        
        $args = array(
            'login' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A_Za-ząęłńśćźżó_-]{2,25}$/']],
            'password' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A_Za-ząęłńśćźżó_-]{8,}$/']]
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
           $this->model->run();
        } else { 
           Session::init();
           Session::set('err', true);
           header('location: http://localhost/projectMVC/login');       
           //echo '<p>Błędne dane to: '.$errors.'</p>';
        }
        
    }
}
