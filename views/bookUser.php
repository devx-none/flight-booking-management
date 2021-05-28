<?php

if($_SESSION['user']){

}else{
    header('Location:login');
}
include './controllers/bookedController.php';
$data = new booked();
$bookings = $data->getBooking();
if(isset($_POST['saveBooking'])){
	$booked = new booked();
	$booked->updateU();
	
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
                    <li class="nav-item" role="presentation"><a class="nav-link " href="home">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="flightsList">Flights List</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="bookedUser">My Bookings</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Contact</a></li>
					</ul><span class="navbar-text actions"> <a href="LogOut.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a></span></div>
        </div>
    </nav>
    <!-- End: Navigation with Button -->
   
    <div class="container-fluid bg-info p-5 mw-100">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Bookings List</b>
				</large>
				
			</div>
			<div class="card-body table-responsive">
				<table class="table table-bordered" id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="30%">
						<col width="50%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Information</th>
							<th class="text-center">Flight Info</th>
							<th class="text-center"> Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
                    <?php foreach ($bookings as $booked):?>
					<tbody>
					<form action="" method="post">
						 <tr>
						    <td class="text-center"> <?php echo $booked['id']?> </td>
						 	<td>
						 		<p>First name :<b><?php echo $booked['first_name']?></b></p>
						 		<p><small>Last name:<b><?php echo $booked['last_name']?></small></b></p>
						 		<p><small>Date naisance :<b><?php echo $booked['date_naissance']?></small></b></p>
						 	</td>
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-4">
								 <img src="./assets/img/<?php echo $booked['logo'];?>.jpg" alt="" width="100" height="100">
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Id flight :<b><?php echo $booked['id_flight']?></b></p>
						 		<p><small>Airline<b><?php echo $booked['airline']?></small></b></p>
						 		<p><small>Location:<b><?php echo $booked['aeroport_depart']?></small></b></p>
						 		<p><small>Date departure:<b><?php echo $booked['date_depart']?></small></b></p>
						 		<p><small>Date arrival :<b><?php echo $booked['date_return']?></small></b></p>
						 		<p><small>status :<b><?php echo $booked['status']?></small></b></p>
						 		</div>
						 		</div>
						 	</td>
							
						    <td class="text-center">
                             <select class="form-select book_flight" aria-label="Default select example" name="status">
                             <option value="Pending" selected  class="bg-primary text-white">Pending</option>
                             <option value="Confirm"  class="bg-success text-white">Confirm</option>
                             <option value="Cancel"  class="bg-warning text-white">Cancel</option>
    
                            </select>
						 	</td>
							 <td class="text-center">
							        <input type="text" name="id_book" value="<?php echo $booked['id']?>" hidden>
									<input type="submit" name="saveBooking" class="btn-primary m-3" value="save" >
									<button class="btn btn-outline-info btn-sm edit_flight" type="button" data-toggle="modal" data-target="" value=""><i class="fa fa-print" aria-hidden="true"></i></button>

						 			
						 	</td>
							

						 </tr>

						 </form>
					</tbody>
                    <?php endforeach ;?>
				</table>
			</div>
		</div>
	</div>
</div>




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
    
    
	<script src="./assets/js/main.js"></script>
		<script src="./js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
</body>

    


</html>
    












</html>