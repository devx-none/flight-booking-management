<?php
if($_SESSION['user']){

}else{
    header('Location:login');
}
include './controllers/flightsController.php';
include './controllers/bookedController.php';

 $data = new flightsController();
 $flights = $data->getFlights();
if(isset($_POST['submit'])){
    $booked = new booked();
    $booked->addBooking();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="./assets/css/styles.min.css">
    <link rel="stylesheet" href="./assets/css/style.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <!-- Start: Navigation with Button -->
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#">Air<span>Flight</span></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="flightsList">Flights List</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="bookUser">My Bookings</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Contact</a></li>
                </ul><span class="navbar-text actions"> <a href="LogOut.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a></span></div>
        </div>
    </nav>
    <!-- End: Navigation with Button -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                    <h3 class="text-white">Flights</h3>
                    <hr class="divider my-4" />
                    <div class="col-md-12 mb-2 text-left">
                    <div class="card">
                        <div class="card-body">
                            <form id="manage-filter"  action="index.php?page=flights" method="POST">
                                <div class="row form-group">
                               
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">From</label>
                                        <select name="departure_airport_id" id="departure_location" class="custom-select browser-default select2">
                                        <option value=""></option>
                                        <?php foreach ($flights as $flight):?>
                                            <option value="<?php $flight['aeroport_depart']?>"><?php echo  $flight['aeroport_depart']?></option>
                                         <?php endforeach; ?>
                                        
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">To</label>
                                        <select name="arrival_airport_id" id="arrival_airport_id" class="custom-select browser-default ">
                                            <option value=""></option>
                                            <?php foreach ($flights as $flight):?>
                                            <option value="<?php $flight['aeroport_Arrive']?>"><?php echo  $flight['aeroport_Arrive']?></option>
                                         <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">Departure Date</label>
                                        <input type="date" class="form-control input-sm " name="date" autocomplete="off" value="">
                                    </div>
                                    <div class="col-sm-3" id="rdate" >
                                        <label for="" class="control-label">Return Date</label>
                                        <input type="date" class="form-control input-sm " id="dateR" name="date_return" autocomplete="off" >
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="trip" id="onewway" value="1"  >
                                          <label class="form-check-label" for="onewway">
                                            One-way
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                          <input class="form-check-input" type="radio" name="trip" id="rtrip" value="2" >
                                          <label class="form-check-label" for="rtrip">
                                           Round Trip
                                          </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 offset-sm-5">
                                        <button class="btn btn-block btn-sm btn-primary"><i class="fa fa-plane-departure"></i> Find Flights</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>                        
                </div>
                </div>
                
            </div>
        </div>
    </header>
    <!-- Start: Features Blue -->
    <div class="features-blue">
        <div class="container">
            <!-- Start: Intro -->
            <div class="intro">
                <h2 class="text-center">Ready for an adventure? Get the AirFlight app to start booking!</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <!-- End: Intro -->
            <!-- Start: Features -->
            <div class="row features">
                <div class="col-sm-6 col-md-4 item"><i class="fa fa-map-marker icon"></i>
                    <h3 class="name">Works everywhere</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
                <div class="col-sm-6 col-md-4 item"><i class="fa fa-clock-o icon"></i>
                    <h3 class="name">Always available</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
                <div class="col-sm-6 col-md-4 item"><i class="fa fa-list-alt icon"></i>
                    <h3 class="name">Festive cashback!</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
                <div class="col-sm-6 col-md-4 item"><i class="fa fa-leaf icon"></i>
                    <h3 class="name">Freedom to change!</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
                <div class="col-sm-6 col-md-4 item"><i class="fa fa-plane icon"></i>
                    <h3 class="name">Fast Forward</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
                <div class="col-sm-6 col-md-4 item"><i class="fas fa-globe icon"></i>
                    <h3 class="name">24 International Destinations</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                </div>
            </div>
            <!-- End: Features -->
        </div>
    </div>
    <!-- End: Features Blue -->
    
    <div class="footer-basic bg-dark text-white">
        <footer>
            <!-- Start: Social Icons -->
            <div class="social"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></i></a><a href="#"><i class="fab fa-snapchat"></i></a></div>
            <!-- End: Social Icons -->
            <!-- Start: Links -->
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <!-- End: Links -->
            <!-- Start: Copyright -->
            <p class="copyright">Air Flight © 2021</p>
            <!-- End: Copyright -->
        </footer>
    </div>
    <!-- End: Footer Basic -->
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="./assets/js/main.js"></script>

<script>





</script>
</body>



</html>