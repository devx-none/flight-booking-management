<?php
require_once './database/db_connect.php';

class flights{

    static public function add($data,$type_flight){
        // $stmt = database::connect()->prepare("INSERT INTO flights(airline,aeroport_depart,aeroport_Arrive,date_depart,date_arrive,place,price) values(:airline,:Aedepart,:Aearrive,:Ddepart,:Darrive,:place,:price)");
        if($type_flight=="round_trip")
        {
           
        $stmt = database::connect()->prepare("INSERT INTO flight(date_depart,date_return,airline,aeroport_depart,aeroport_arrive,place,price,logo,Date) values
        (:Ddepart,:Darrive,:airline,:Aedepart,:Aearrive,:place,:price,:airline,now()),
        (:Dreturn,:Darrival2,:airline,:Aearrive,:Aedepart,:place,:price,:airline,now());");
        $stmt->bindParam(':Dreturn',$data['Dreturn']);
        $stmt->bindParam(':Darrival2',$data['Darrival2']);
        }else{ $stmt = database::connect()->prepare("INSERT INTO flight(date_depart,date_return,airline,aeroport_depart,aeroport_arrive,place,price,logo,Date) values(:Ddepart,:Darrive,:airline,:Aedepart,:Aearrive,:place,:price,:airline,now())");

        }
    $stmt->bindParam(':airline',$data['airline']);
    $stmt->bindParam(':Aedepart',$data['Aedepart']);
    $stmt->bindParam(':Aearrive',$data['Aearrive']);
    $stmt->bindParam(':Ddepart',$data['Ddepart']);
    $stmt->bindParam(':Darrive',$data['Darrival']);
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


    static public function allFlights() {
    
        $stmt = database::connect()->prepare("SELECT * FROM flight ");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt=null;
    }


    static public function delete_flight($id_flight){
        $stmt = database::connect()->prepare("DELETE from flight  where id=:id_flight ");
        $stmt->bindParam(':id_flight',$id_flight);
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
    static public function update_flight($data){
        $stmt = database::connect()->prepare("UPDATE  flight set airline=:airline ,aeroport_depart=:Aedepart ,aeroport_arrive=:Aearrive ,date_depart=:Ddepart ,date_return=:Darrive ,place=:place ,price=:price,logo=:airline  where id=:id_flight");
        $stmt->bindParam(':airline',$data['airline']);
    $stmt->bindParam(':Aedepart',$data['Aedepart']);
    $stmt->bindParam(':Aearrive',$data['Aearrive']);
    $stmt->bindParam(':Ddepart',$data['Ddepart']);
    $stmt->bindParam(':Darrive',$data['Dreturn']);
    $stmt->bindParam(':place',$data['place']);
    $stmt->bindParam(':price',$data['price']);
    $stmt->bindParam(':id_flight',$data['id_flight']);
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

    static public function getbooked(){
        $stmt = database::connect()->prepare("SELECT b.*,f.* FROM booking b ,flight f where b.id_flight=f.id  and f.id");    
      

        $stmt->execute();
        $count = $stmt->rowCount();
    return $count;
    $stmt->close();
    $stmt=null;
    }

    
    

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



?>