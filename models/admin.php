<?php

include '.\database\db_connect.php';

class administrateur{

    static public function admin($data){
      $stmt = database::connect()->prepare("SELECT * FROM administrateur where email=:email AND password=:password");
      $stmt->bindParam(':email',$_POST['email']);
      $stmt->bindParam(':password',$_POST['password']);
      $stmt->execute();
      $count =$stmt->rowCount();
      if($count>0){
          return 'OK';

      }else{
          return 'ERROR';
      }
      $stmt->close();
        $stmt=null;
    }
}


?>