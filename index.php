<?php
require_once './autoload.php';
require_once './controllers/homeController.php';
$home = new HomeController();

$page =['home','admin','login','signup'];
if(isset($_GET['page'])){
    if(in_array($_GET['page'],$page)){
        $page = $_GET['page'];
        $home->index($page);
    }else{
        header('Location:views/includes/404.php');
    }
}

?>