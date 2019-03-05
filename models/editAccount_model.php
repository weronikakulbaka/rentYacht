<?php
class EditAccount_Model extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function run() {

        $ssth = $this->db->prepare("SELECT id FROM users WHERE password = MD5(:password)");
        $ssth->execute(array(
            ':password' => $_POST['password']
        ));
       //$data = $ssth->fetchAll();
       Session::init();
       $count = $ssth->rowCount();
       if($count>0){
          
           
          $ssthN = $this->db->prepare("UPDATE users SET password = MD5(:newPassword) WHERE password = MD5(:password)");
          $ssthN->execute(array(
            ':newPassword' => $_POST['newPassword'],
            ':password' => $_POST['password']
          ));
   
             Session::set('editPass', true);
             header('location: http://localhost/projectMVC/editAccount'); 
          
       } else{

           Session::set('err', true);
           header('location: http://localhost/projectMVC/editAccount');
       }
    }

}