<?php
require_once 'autoload.php';
require_once 'controllers/homeController.php';
$home = new HomeController();

$page =['home','login','flightsList','signup','bookUser'];
$page_admin =['admin','dashboard','flights','booked'];

if(isset($_GET['page'])){
    if(in_array($_GET['page'],$page)){
        $page = $_GET['page'];
        $home->index($page);
       
    }else if(in_array($_GET['page'],$page_admin)){
        $page_admin = $_GET['page'];
        $home->indexAdmin($page_admin);
       
    }else{
        include 'views/includes/404.php';
    }

        
}else{
    $home->index('login');
}

?>