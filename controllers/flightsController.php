<?php

require './models/flights.php';
class flightsController{

    public function addFlight(){
        if(isset($_POST['submit'])){
            $data = array(
                'airline'=>$_POST['airline'],
                'Aedepart'=>$_POST['departure_airport_id'],
                'Aearrive'=>$_POST['arrival_airport_id'],
                'Ddepart'=>$_POST['departure_datetime'],
                'Darrival'=>$_POST['arrival_datetime'],
                'place'=>$_POST['seats'],
                'price'=>$_POST['price'],
                'Dreturn'=>$_POST['return_datetime'],
                'Darrival2'=>$_POST['arrival_datetime2']
            );
            $type_flight=$_POST['Radio_check'];

            $result = flights::add($data,$type_flight);
            
            if($result==='ok'){
                
            }else{
                echo $result;
            }

        }
    }
    public function getFlights(){

        $flights = flights::allFlights();
        return $flights;
    }
    public function delete_flight(){
        if(isset($_POST['delete'])){
            $id_flight=$_POST['delete_flight'];
            $result = flights::delete_flight($id_flight);
            if($result==='ok'){
               
            }else{
                echo $result;
            }
        }
    }

    public function update_flight(){
    //   if(isset($_POST['update'])){
        $data = array(
            'airline'=>$_POST['airlineU'],
            'Aedepart'=>$_POST['departure_airport'],
            'Aearrive'=>$_POST['arrival_airport'],
            'Ddepart'=>$_POST['departure_date'],
            'Dreturn'=>$_POST['arrival_date'],
            'place'=>$_POST['seatsU'],
            'price'=>$_POST['priceU'],
            'id_flight'=>$_POST['id']

        
        );
        $result = flights::update_flight($data);
        
        if($result==='ok'){
           

            
        }else{
            echo $result;
            
        }

          
    //   }

    }
    public function booked(){
        $flight_booked=flights::getbooked();
        return $flight_booked;
    
    }

}

    
?>