
<?php

require_once './database/db_connect.php';
if(isset($_POST['update'])){
	$flight = new flightsController();
	$flight->update_flight();
	
	
}
if(isset($_POST['delete'])){
	$delete = new flightsController();
	$delete->delete_flight();
}
$data = new flightsController();
$flights = $data->getFlights();
$booked_flights = new flightsController();
$booked_flight=$booked_flights->booked();



?>

<!-- Modal confirmation delete-->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  Are you sure to delete this Flight?
      </div>
	  <form action="flights" method="POST">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="text"  id="delete_flight" name="delete_flight" hidden >
		<input type="submit" class="btn btn-primary"  name="delete" value="Delete">
      </div>
	  </form>
    </div>
  </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn mt-5 btn-primary" data-bs-toggle="modal" data-bs-target="#new_flight">
  New Flight
</button>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<!-- <large class="card-title">
					<b>Flight List</b>
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button" id="new_flight"><i class="fa fa-plus"></i> New Flight</button> -->
			</div>
			<div class="table-responsive">
				<table class="table  " id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="35%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="15%">
					</colgroup>
					<thead class="table-dark" >
						<tr>
							<th class="text-center">Date</th>
							<th class="text-center">Information</th>
							<th class="text-center">Seats</th>
							<th class="text-center">Booked</th>
							<th class="text-center">Available</th>
							<th class="text-center">Price</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody  class="table-primary ">
						<?php foreach ($flights as $flight):?>
							<?php $stmt = database::connect()->prepare("SELECT * FROM booking where id_flight = ".$flight['id']);
                         $stmt->execute();
                         $count = $stmt->rowCount(); ?>
						 <tr>
						
						 	
						 	<td><?php echo $flight['Date'];?></td>
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-4">
						 			<img src="./assets/img/<?php echo $flight['logo']; ?>.jpg" alt="" class=" " width="200" height="250">
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Airline :<b></b></p>
						 		<p><small>Airline : <b><?php echo $flight['airline'];?></small></b></p>
						 		<p><small>Location :<b><?php echo $flight['aeroport_depart'];?></b>-<b><?php echo $flight['aeroport_Arrive'];?></small></b></p>
						 		<p><small>Departure :<b><?php echo $flight['date_depart'];?></small></b></p>
						 		<p><small>Arrival :<b><?php echo $flight['date_return'];?></small></b></p>
						 		</div>
						 		</div>
						 	</td>
						 	<td class="text-right"><?php echo $flight['place'];?></td>
						 	<td class="text-right"> <?php echo $count ?></td>
						 	<td class="text-right"><?php echo $flight['place']-$count;?></td>
						 	<td class="text-right"><?php echo $flight['price'];?></td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_flight" type="button" data-toggle="modal" data-target="#editModal" value="<?php echo $flight['id'] ?>"><i class="fa fa-edit"></i></button>
						 		   <button class="btn btn-outline-danger btn-sm delete_flight"  type="button"  data-toggle="modal" data-target="#delete_modal" value="<?php echo $flight['id'] ?>"  ><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endforeach; ?>
					</tbody>
				</table>
				
			</div>
		</div>
	</div>
</div>

<!-- Modal information edit flight -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModallLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Flight</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 <form  action="" method="post" id="formedit">
<div class="modal-body">
 <div class="container-fluid">
	<div class="col-lg-12">
			<input type="text" id="ed_id_flight" name="id" value="" hidden>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="" class="control-label">Airline</label>
						<select name="airlineU" id="airline" class="custom-select browser-default ">
						    <option value="">	</option>
							<option value="American Airlines">American Airlines	</option>
							<option value="Delta Air Lines">Delta Air Lines	</option>
							<option value="Allegiant Air">Allegiant Air	</option>
							<option value="Frontier Airlines">Frontier Airlines</option>
							
						</select>
					</div>
				</div>
			</div>
			
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Departure Location</label>
						<select name="departure_airport" id="departure_location" class="custom-select browser-default ">
							<option value="" ></option>
							<option value="Menara Airport/Marrakech/morocco">Menara Airport/Marrakech/morocco</option>
							<option value="Mohammed v Airport/Casablanca/morocco">Mohammed v Airport/Casablanca/morocco</option>
							<option value="Dubai Airport/Dubai/Emarate">Dubai Airport/Dubai/Emarate</option>
					
					
						</select>

					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Location</label>
						<select name="arrival_airport" id="arrival_airport_id" class="custom-select browser-default ">
							<option value="" ></option>
							<option value="Menara Airport/Marrakech/morocco">Menara Airport/Marrakech/morocco</option>
							<option value="Mohammed v Airport/Casablanca/morocco">Mohammed v Airport/Casablanca/morocco</option>
							<option value="Dubai Airport/Dubai/Emarate">Dubai Airport/Dubai/Emarate</option>
					
					
						</select>

					</div>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Departure Data/Time</label>
						<input type="datetime-local" name="departure_date" id="departure_datetime" class="form-control datetimepicker" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Data/Time</label>
						<input type="datetime-local" name="arrival_date" id="arrival_datetime" class="form-control datetimepicker" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="">
						<label for="">Seats</label>
						<input name="seatsU" id="seats" type="number" step="any" class="form-control text-right" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Price</label>
						<input name="priceU" id="price" type="number" step="any" class="form-control text-right" value="">
					</div>
				</div>
			</div>
			
		
	</div>
  </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="update" value="Save changes" id="saveChane" ">
      </div>
</form>
      
    </div>
  </div>
</div>
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
<script>
  

</script>
