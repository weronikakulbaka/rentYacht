<?php

class Index extends Controller{
    function __construct() {
        parent::__construct();
    }
    
    function loadView(){
        $this->view->render('index/index');
    }
    
    public function other($arg = false){
        $this->view->render('index/index');
        echo 'inside other';
        
    }
 
}
