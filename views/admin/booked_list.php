
<?php 
include './controllers/bookedController.php';
$data = new booked();
$bookings = $data->getBookingAdmin();

if(isset($_POST['delete'])){
	$delete = new booked();
	$delete->delete_booking();
}
if(isset($_POST['update_booking'])){
	$update = new booked();
	$update->updateBooking();
}
?>
<!-- Modal confirmation delete-->
<div class="modal fade" id="delete_booked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  Are you sure to delete this Booking?
      </div>
	  <form action="" method="POST">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="text"  id="booked_id" name="booked_id" hidden >
		<input type="submit" class="btn btn-primary"  name="delete_booked" value="Delete">
      </div>
	  </form>
    </div>
  </div>
</div>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Bookings List</b>
				</large>
				
			</div>
			<div class="card-body table-responsive">
				<table class="table table-primary  " id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="30%">
						<col width="50%">
						<col width="10%">
					</colgroup>
					<thead class="table-primary">
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Information</th>
							<th class="text-center">Flight Info</th>
							<th class="text-center">Status </th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
                    <?php foreach ($bookings as $booked):?>
					<tbody class="text_white">
						
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
						 			
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Id flight :<b><?php echo $booked['id_flight']?></b></p>
						 		<p><small>Airline<b><?php echo $booked['airline']?></small></b></p>
						 		<p><small>Location:<b><?php echo $booked['aeroport_depart']?>-<?php echo $booked['aeroport_Arrive']?></small></b></p>
						 		<p><small>Date departure:<b><?php echo $booked['date_depart']?></small></b></p>
						 		<p><small>Date Arrival :<b><?php echo $booked['date_return']?></small></b></p>
						 		<p><small>Status :<b><?php echo $booked['status']?></small></b></p>
						 		</div>
						 		</div>
						 	</td>
							 <td class="text-center text-white bg-info">
							 <?php echo $booked['status']?>
							 </td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_booked" type="button" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_booked" type="button" data-toggle="modal" data-target="#delete_booked" value="<?php echo $booked['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

               
					</tbody>
                    <?php endforeach ;?>
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
 <form  action="" method="post">
<div class="modal-body">
 <div class="container-fluid">
	<div class="col-lg-12">
			<input type="text" name="id_flight_b" id="id_f_booking"  hidden>
			<div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">First Name</label> 
						<input type="text" name="first_name" >

					</div>
				</div>
				<div class="col-md-6">
					<div class="">
					<div class="">
						<label for="">Last Name</label> 
						<input type="text" name="last_name" >

					</div>
                    </div>
					
				</div>
				<div class="col-md-6">
					
					<div class="">
						<label for="">Status :</label> 
						<select class="form-select book_flight" aria-label="Default select example" name="status">
                             <option value="Pending" selected  class="bg-primary text-white">Pending</option>
                             <option value="Confirm"  class="bg-success text-white">Confirm</option>
                             <option value="Cancel"  class="bg-warning text-white">Cancel</option>

					</div>

					
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="" class="control-label">Airline</label>
						<select name="airline" id="airline" class="custom-select browser-default ">
						    <option value="">	</option>
							<option value="American Airlines">American Airlines	</option>
							<option value="Delta Air Lines">Delta Air Lines	</option>
							<option value="Allegiant Air">Allegiant Air	</option>
							<option value="Frontier Airlines">Frontier Airlines</option>
							
						</select>
					</div>
				</div>
			</div> -->
			
			<!-- <div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Departure Location</label>
						<select name="departure_airport_id" id="departure_location" class="custom-select browser-default ">
							<option value="" ></option>
							<option value="Menara Airport/Marrakech/morocco">Menara Airport/Marrakech/morocco</option>
							<option value="Mohammed v Airport/Casablanca/morocco">Mohammed v Airport/Casablanca/morocco</option>
							<option value="Dubai Airport/Dubai/Emarate">Dubai Airport/Dubai/Emarate</option>
					
					
						</select>

					</div>
				</div> -->
				<!-- <div class="col-md-6">
					<div class="">
						<label for="">Arrival Location</label>
						<select name="arrival_airport_id" id="arrival_airport_id" class="custom-select browser-default ">
							<option value="" ></option>
							<option value="Menara Airport/Marrakech/morocco">Menara Airport/Marrakech/morocco</option>
							<option value="Mohammed v Airport/Casablanca/morocco">Mohammed v Airport/Casablanca/morocco</option>
							<option value="Dubai Airport/Dubai/Emarate">Dubai Airport/Dubai/Emarate</option>
					
					
						</select>

					</div>
				</div> -->
			<!-- </div> -->
			<!-- <div class="row form-group">
				<div class="col-md-6">
					<div class="">
						<label for="">Departure Data/Time</label>
						<input type="datetime-local" name="departure_datetime" id="departure_datetime" class="form-control datetimepicker" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Data/Time</label>
						<input type="datetime-local" name="arrival_datetime" id="arrival_datetime" class="form-control datetimepicker" value="">
					</div>
				</div>
			</div> -->
			<!-- <div class="row">
				<div class="col-md-6">
					<div class="">
						<label for="">Seats</label>
						<input name="seats" id="seats" type="number" step="any" class="form-control text-right" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Price</label>
						<input name="price" id="price" type="number" step="any" class="form-control text-right" value="">
					</div>
				</div>
			</div>
			 -->
		
	</div>
  </div>
</div>
<div class="modal-footer">
	     
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="update_booking" value="Save changes">
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