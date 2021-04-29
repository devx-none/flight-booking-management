<?php
require '.\database\db_connect.php';

class flight_list {

    static public function allFlights() {

        $stmt = database::connect()->prepare("SELECT * FROM flight ");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt=null;
    }

    


}