<?php
include '.\models\admin.php';

class login_admin{
public function login_admin(){
    if(isset($_POST['submit'])){

        $data = array(

            'email'=>$_POST['email'],
            'password'=>$_POST['password']
        );
        $result = administrateur::admin($data);
        
        if($result==='ok'){
            echo $result;

        }else{
            echo $result;
        }
    }
}

}

?>