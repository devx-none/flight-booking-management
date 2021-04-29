<?php 
require '..\database\db_connect.php';

class flights{

    static public function add($data){
        // $stmt = database::connect()->prepare("INSERT INTO flights(airline,aeroport_depart,aeroport_Arrive,date_depart,date_arrive,place,price) values(:airline,:Aedepart,:Aearrive,:Ddepart,:Darrive,:place,:price)");
        $stmt = database::connect()->prepare("INSERT INTO flight(date_depart,date_arrive,airline,aeroport_depart,aeroport_arrive,place,price) values(:Ddepart,:Darrive,:airline,:Aedepart,:Aearrive,:place,:price)");
    $stmt->bindParam(':airline',$data['airline']);
    $stmt->bindParam(':Aedepart',$data['Aedepart']);
    $stmt->bindParam(':Aearrive',$data['Aearrive']);
    $stmt->bindParam(':Ddepart',$data['Ddepart']);
    $stmt->bindParam(':Darrive',$data['Darrive']);
    $stmt->bindParam(':place',$data['place']);
    $stmt->bindParam(':price',$data['price']);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count>0){
        return 'ok';
    }else{
        return 'error';
    }
    $stmt->close();
    $stmt=null;
    }


//     static public  function login_user($data){
//         $stmt = database::connect()->prepare("SELECT * from utlisateur where email=:email AND password=:password");
//         $stmt->bindParam(':email',$data['email']);
//         $stmt->bindParam(':password',$data['password']);
//         $stmt->execute();
//         $count = $stmt->rowCount();
//         if($count>0){
//             return 'ok';
//         }else{
//             return 'error';
//         }
//         $stmt->close();
//         $stmt=null;

//     }
}


?>