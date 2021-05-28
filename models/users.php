<?php 
require_once './database/db_connect.php';


class users{

    static public function add($data){
        $stmt = database::connect()->prepare("INSERT INTO utlisateur(nom,prenom,date_naissance,email,password) values(:nom,:prenom,:date_naissance,:email,:password)");
    $stmt->bindParam(':nom',$data['nom']);
    $stmt->bindParam(':prenom',$data['prenom']);
    $stmt->bindParam(':date_naissance',$data['date_naissance']);
    $stmt->bindParam(':email',$data['email']);
    $stmt->bindParam(':password',$data['password']);
   
    if($stmt->execute()){
        return 'ok';
    }else{
        return 'error';
    }
    $stmt->close();
    $stmt=null;
    }


    static public  function login_user($data){
        $stmt = database::connect()->prepare("SELECT * from utlisateur where email=:email AND password=:password");
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':password',$data['password']);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count>0){
            return 'ok';
        }else{
            return 'invalid password or email';
        }
        $stmt->close();
        $stmt=null;

    }
}


?>