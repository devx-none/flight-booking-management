<?php
include './models/booked.php';
class booked{

    public function addBooking(){
       
            
                $first_name=$_POST['first_name'];
                $last_name=$_POST['last_name'];
                $date=$_POST['date'];
                $id_flight=$_POST['id_flight'];
            $result = booking::add($first_name,$last_name,$date,$id_flight);
            
            if($result==='ok'){
                
            }else{
                echo $result;
            }

        
    }
    public function getBooking(){
        $email = $_SESSION['user'];
        $booked = booking::allbooked($email);
        return $booked;
    }
    public function getBookingAdmin(){
        $booked = booking::allbookedAdmin();
        return $booked;
    }
    public function delete_booking(){
           if(isset($_POST['delete_booked'])){
            $id_booking=$_POST['booked_id'];
            $result = booking::delete_booking($id_booking);
            if($result==='ok'){
               
            }else{
                echo $result;
            }
           }
    }
    public function updateBooking(){
       
        if(isset($_POST['update_booking'])){
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        // $date=$_POST['date'];
        $status=$_POST['status'];
        $id=$_POST['id_flight_b'];

    $result = booking::update($first_name,$last_name,$status,$id);
    
    if($result==='ok'){
       
    }else{
        echo $result;
    }
}
}
public function updateU(){
    if(isset($_POST['saveBooking'])){
        $id=$_POST['id_book'];
        $status=$_POST['status'];

    $result = booking::updateU($status,$id);
    
    if($result==='ok'){
        
    }else{
        echo $result;
    }
    }
}

}

    
?>