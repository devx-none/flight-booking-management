<?php
require './models/admin.php';

class login_admin{
public function login_admin(){
    if(isset($_POST['submit'])){

        $data = array(

            'email'=>$_POST['email_admin'],
            'password'=>$_POST['password']
        );
        $result = administrateur::admin($data);
        
        if($result==='OK'){
            session_start();
            $_SESSION['admin']=$_POST['email_admin'];
            header('Location: dashboard');
        }else{
            echo $result;
        }
    }
}

}

?>