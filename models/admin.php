<?php

require_once './database/db_connect.php';

class administrateur{

    static public function admin($data){
      $stmt = database::connect()->prepare("SELECT * FROM administrateur where email=:email AND password=:password");
      $stmt->bindParam(':email',$data['email']);
      $stmt->bindParam(':password',$data['password']);
      $stmt->execute();
      $count =$stmt->rowCount();
      if($count>0){
          return 'OK';

      }else{
          return 'invalid password or email';
      }
      $stmt->close();
        $stmt=null;
    }
}


?>