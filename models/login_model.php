<?php

class Login_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function run() {

        $ssth = $this->db->prepare("SELECT id FROM users WHERE login = :login AND password = MD5(:password)");
        $ssth->execute(array(
            ':login' =>$_POST['login'],
            ':password' => $_POST['password']
        ));
        
       $data = $ssth->fetch();
       Session::init();
       $count = $ssth->rowCount();
       if($count>0){
           //login 
           Session::set('userID', $data['id']);
           Session::set('loggedIn', true);
           header('location: http://localhost/projectMVC/dashboard');
       } else{

           Session::set('err', true);
           header('location: http://localhost/projectMVC/login');
       }
    }

}

