<?php

class Register_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function inputData() {

        $ssth = $this->db->prepare("INSERT INTO users (login, password, name, surname, email) values (:login, MD5(:password), :name, :surname, :email)");
        $ssth->execute(array(
            ':login' =>$_POST['login'],
            ':password' => $_POST['password'],
            ':name' => $_POST['name'],
            ':surname' => $_POST['surname'],
            ':email' => $_POST['email']
        ));
        
       
       $count = $ssth->rowCount();
       if($count>0){
           //register
           header('location: ../login');
       } else{
           Session::init();
           Session::set("error", true);
           header('location: ../register');
       }
    }

}
