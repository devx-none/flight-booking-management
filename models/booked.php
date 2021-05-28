<?php
require_once './database/db_connect.php';

class booking{

    static public function add($first_name,$last_name,$date,$id_flight){
        for($i=0;$i<count($first_name);$i++){
            $stmt = database::connect()->prepare("INSERT INTO booking(first_name,last_name,date_naissance,id_flight) values(:first_name,:last_name,:date_naissance,:id_flight)");
            $stmt->bindParam(':first_name',$first_name[$i]);
            $stmt->bindParam(':last_name',$last_name[$i]);
            $stmt->bindParam(':date_naissance',$date[$i]);
            $stmt->bindParam(':id_flight',$id_flight);
            $stmt->execute();
        }
       
    
    $count = $stmt->rowCount();
    if($count>0){
        return 'ok';
    }else{
        return 'error';
    }
    $stmt->close();
    $stmt=null;
    }


    static public function allbooked($email) {
    
        $stmt = database::connect()->prepare("SELECT b.*,f.date_depart,f.date_return,f.airline,f.aeroport_depart,f.aeroport_Arrive,f.logo FROM booking b ,flight f,utlisateur u where b.id_flight=f.id AND u.id_user=b.id_user AND u.email=:email ");
        $stmt->bindParam(':email',$email);
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt=null;
    }
    static public function allbookedAdmin() {
    
        $stmt = database::connect()->prepare("SELECT b.*,f.date_depart,f.date_return,f.airline,f.aeroport_depart,f.aeroport_Arrive,f.logo FROM booking b ,flight f,utlisateur u where b.id_flight=f.id  AND u.id_user=b.id_user ");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt=null;
    }
    static public function delete_booking($id_booking){
        $stmt = database::connect()->prepare("DELETE from booking  where id=50 ");
        $stmt->bindParam(':id_booking',$id_booking);
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
    static public function update($first_name,$last_name,$status,$id){
        
            // $stmt = database::connect()->prepare("UPDATE booking set first_name=:first_name,last_name=::last_name,date_naissance=:date_naissance where id=:id)");
            $stmt = database::connect()->prepare("UPDATE booking set first_name=:first_name ,last_name=:last_name,status=:status where id=:id");
            $stmt->bindParam(':first_name',$first_name);
            $stmt->bindParam(':last_name',$last_name);
            // $stmt->bindParam(':date_naissance',$date);
            $stmt->bindParam(':status',$status);
            $stmt->bindParam(':id',$id);
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

    static public function updateU($status,$id){
        $stmt = database::connect()->prepare("UPDATE booking set status=:status  where id=:id");
       
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':status',$status);
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

}
    





?>