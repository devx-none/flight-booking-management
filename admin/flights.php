<?php
  include '..\controllers\flightsController.php';
  if(isset($_POST['submit'])){
      $flight = new flightsController();
      $flight->addFlight();
  }
?>
<div class="model-content">
 <div class="model-header">
	 <
	  <h5 class="model-title">New Flight</h5>
	  <button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
 </div>
 <div class="model-body">
  <div class="container-fluid">
	<div class="col-lg-12">
	
		<form id="manage-flight" action="" method="post">
			<input type="hidden" name="id" value="">
			<div class="row">
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
			</div>
			
			<div class="row form-group">
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
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Location</label>
						<select name="arrival_airport_id" id="arrival_airport_id" class="custom-select browser-default ">
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
						<input type="datetime-local" name="departure_datetime" id="departure_datetime" class="form-control datetimepicker" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Data/Time</label>
						<input type="datetime-local" name="arrival_datetime" id="arrival_datetime" class="form-control datetimepicker" value="">
					</div>
				</div>
			</div>
			<div class="row">
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
			<div class="row">
			<input type="submit" value="Save" class="btn btn-primary" name="submit">

			</div>
		</form>
	</div>
  </div>
 </div>
 <div class="model-footer">
   
   
 
 </div>
</div>

<script>
 


</script>
