<?php

class Dashboard_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function rentBoat() {

        $ssth = $this->db->prepare("INSERT INTO orders (model, port, cruiseLength, payment, name, surname, email, userID) values (:model, :port, :cruiseLength, :payment, :name, :surname, :email, :userID)");
        $ssth->execute(array(
            ':model' =>$_POST['model'],
            ':port' => $_POST['port'],
            ':cruiseLength' => $_POST['cruiseLength'],
            ':payment' => $_POST['payment'],
            ':name' => $_POST['name'],
            ':surname' => $_POST['surname'],
            ':email' => $_POST['email'],
            ':userID' => Session::get('userID')
        ));
        
       $count = $ssth->rowCount();
       if($count>0){
           Session::set("order", true);
           header('location: http://localhost/projectMVC/dashboard');
       }else{

           Session::set("err", true);
           header('location: http://localhost/projectMVC/dashboard');
       }
       
    }
}
