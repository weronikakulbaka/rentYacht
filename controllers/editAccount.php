<?php

class EditAccount extends Controller{
    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false){
            Session::destroy();
            header('location: http://localhost/projectMVC/login');
            exit;
        }
    }
    
    function loadView(){
        $this->view->render('editAccount/index');
    }
    
    function run(){
        
        $args = array(
            'newPassword' => ['filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^[0-9A_Za-ząęłńśćźżó_-]{8,}$/']],
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
           header('location: http://localhost/projectMVC/editAccount');       
           //echo '<p>Błędne dane to: '.$errors.'</p>';
        }
        
    }
}
