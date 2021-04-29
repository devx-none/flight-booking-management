<?php
require_once '..\models\flights.php';
class flightsController{

    public function addFlight(){
        if(isset($_POST['submit'])){
            $data = array(
                'airline'=>$_POST['airline'],
                'Aedepart'=>$_POST['departure_airport_id'],
                'Aearrive'=>$_POST['arrival_airport_id'],
                'Ddepart'=>$_POST['departure_datetime'],
                'Darrive'=>$_POST['arrival_datetime'],
                'place'=>$_POST['seats'],
                'price'=>$_POST['price']

            
            );
            $result = flights::add($data);
            
            if($result==='ok'){
                
            }else{
                echo $result;
            }

        }
    }
}
?>