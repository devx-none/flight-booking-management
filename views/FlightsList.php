<?php
if($_SESSION['user']){

}else{
    header('Location:login');
}
require_once './database/db_connect.php';
include './controllers/flightsController.php';
include './controllers/bookedController.php';

 $data = new flightsController();
 $flights = $data->getFlights();
//  $booked_flights = new flightsController();
//  $booked_flight=$booked_flights->booked();
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="home">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Flights List</a></li>
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
    <section class="page-section " id="flight" >

        <div class="container">
        	<div class="card">
        		<div class="card-body bg-info">
        			<div class="col-lg-12 bg-light">
						<div class="row">
							<div class="col-md-12 text-center">
								<h2><b>Flights Available </b></h2>
							</div>
						</div>
						
                        <?php foreach ($flights as $flight):?>
                        <?php $stmt = database::connect()->prepare("SELECT * FROM booking where id_flight = ".$flight['id']);
                         $stmt->execute();
                         $count = $stmt->rowCount(); ?>
                            <hr class="divider">
				<div class="row align-items-center">
					<div class="col-md-3">
						<img src="./assets/img/<?php echo $flight['logo'];?>.jpg" alt="" width="200" height="250">
					</div>
					<div class="col-md-6">
						 <p>Type:<b><?php echo $flight['type'] ?></b></p>
						 <p><small>Airline: <b><?php echo $flight['airline'] ?></b></small></p>
                         <p><small>From: <b><?php echo $flight['aeroport_depart']?></b></small></p>
						 <p><small>To: <b><?php echo $flight['aeroport_Arrive']?></b></small></p>
						 <p><small>Departure: <b><?php echo $flight['date_depart'] ?></b></small></p>
						 <p><small>Arrival: <b><?php echo $flight['date_return'] ?></b></small></p>
						 <p>Available Seats : <b><h4> <?php echo $flight['place']-$count ?></h4></b></p>
					</div>
					<div class="col-md-3 text-center align-self-end-sm">
						<h4 class="text-right"><b><?php echo $flight['price'] ?>$</b></h4>
						<button class="btn-outline-primary  btn  mb-4 book_flight" type="button"  name="id_flight" value="<?php echo $flight['id'] ?>" data-toggle="modal" data-target="#modelBook">Book Now</button>
					</div>
                    
				</div>
                <?php endforeach; ?>
				<!-- <hr class="divider" style="max-width: 60vw">
			
					<div class="row align-items-center">
						<h5 class="text-center"><b>No result.</b></h5>
					<hr> -->
        	</div>
        </div>
        

 <div class="modal" id="modelBook" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalVerticallyCenteredLabel"></h5>
        <!-- <button type="button" class="btn-close" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="book-flight">
		<input type="text" name="id_flight" id="flight_id" style="display: none">
		<div class="form-group row " id="passager">
			<div class="col-md-3">
			<label for="" class="control-label">Person/s</label>
			<input type="number" class="form-control text-right" min='1' value="1"  id="count" max="10">
			</div>
			
		</div>
		<div id="row-field"  style="display: none">
        <div class="row form-group d-flex justify-content-around"" id="form_group">
			<!-- <div class="row " >
				<div class="col-md-12 text-center" > -->
					<!-- <button class="btn btn-primary btn-sm " name="submit" >Save</button>
					<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button> -->
				<!-- </div>
			</div> -->
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="Go" >GO</button>
        <button class="btn btn-primary" name="submit" id="save" style="display:none" >Save</button>
      </div>
      </form>
     
    </div>
  </div>
</div>
    </section>

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