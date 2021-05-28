<?php
if($_SESSION['admin']){
    
}else{
    header('Location:admin');
}
 include './controllers/flightsController.php';


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <Link href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="stylesheet" href="./assets/css/style.min.css">
        <link rel="stylesheet" href="./assets/css/styleDashboard.css">

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        

        <title>flight booking system</title>
    </head>
    <body id="body-pd" class="body-pd mt-5">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="assets/img/perfil.jpg" alt="">
            </div>
        </header>
        
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="dashboard" class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">AirFlight</span>
                    </a>

                    <div class="nav__list">
                        <a href="booked" class="nav__link ">
                        <i class="fa fa-book"></i>
                        
                            <span class="nav__name">Booked</span>
                        </a>

                        <a href="#" class="nav__link">
                        <i class="fa fa-plane" aria-hidden="true"></i>
                            <span class="nav__name active">Flights</span>
                        </a>
                        
                        <a href="#" class="nav__link">
                            <i class='bx bx-message-square-detail nav__icon' ></i>
                            <span class="nav__name">Airport</span>
                        </a>

                        <a href="#" class="nav__link">
                        <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Users</span>
                        </a>

                    
                    </div>
                </div>

                <a href="Logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>
        <?php include 'Newflight.php' ?>
        <?php include 'FlightsList.php' ?>
        
        <!--===== MAIN JS =====-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <script src="./assets/js/main.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script>
        
        
        </script>
        
    </body>
    <style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>
    <script src="https://use.fontawesome.com/a4219a98e6.js"></script>
</html>