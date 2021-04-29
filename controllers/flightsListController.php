<?php
include '.\models\flightList.php';
class flightsListController{

    public function getFlights(){

        $flights = flight_list::allFlights();
        return $flights;
    }
}

?>