<?php 
 class homeController{

    public function index($page){
     include('views/'.$page.'.php');
    }
    public function indexAdmin($page){
      include('views/admin/'.$page.'.php');
    }
 }


?>