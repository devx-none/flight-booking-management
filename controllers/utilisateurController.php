<?php
include './models/users.php';
class userController{

    public function addUser(){
        if(isset($_POST['submit'])){
            $data =array(
                'nom'=>$_POST['nom'],
                'prenom'=>$_POST['prenom'],
                'date_naissance'=>$_POST['date_naissance'],
                'email'=>$_POST['email'],
                'password'=>$_POST['password']

            );
            $result = users::add($data);
            
            if($result==='ok'){
               header('Location:login');
                
            }else{
                echo $result;
            }

        }
    }
     public function login(){
        
        if(isset($_POST['submit'])){
            $data =array(
                'email'=>$_POST['email'],
                'password'=>$_POST['password']

            );
            $result = users::login_user($data);
           
            if($result==='ok'){
                session_start();
                $_SESSION['user']=$_POST['email'];
                 header('Location: home');
        
            }else{
                echo $result;
               
                
               
               
            }

     }
    }
}

?>