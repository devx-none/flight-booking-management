<?php

  if(isset($_POST['submit'])){
    $flight = new flightsController();
    $flight->addFlight();
	
  }
?>
<!-- <div class="model-content">
 <div class="model-header">
	 
 <h5 class="modal-title" id="staticBackdropLabel">New Flight</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>
 
</div> -->




<!-- Modal -->
<div class="modal fade" id="new_flight" role="dialog"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">News Flight</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="model-body">
  <div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-flight" action="" method="post">
			<input type="hidden" name="id" value="">
			<div class="row">
				<div class="col-md-8">
				<div class="form-check">
                  <input class="form-check-input" type="radio" name="Radio_check" id="one-way">
                    <label class="form-check-label" for="one-way">
                        One Way
                   </label>
                </div>
                <div class="form-check">
                 <input class="form-check-input" type="radio" name="Radio_check" value="round_trip" id="round-trip" checked>
                    <label class="form-check-label" for="round-trip">
                       Round Trip
                    </label>
                </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label for="" class="control-label">Airline</label>
						<select name="airline" id="" class="custom-select browser-default ">
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
						<select name="departure_airport_id" id="" class="custom-select browser-default ">
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
						<select name="arrival_airport_id" id="" class="custom-select browser-default ">
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
						<input type="datetime-local" name="departure_datetime" id="" class="form-control datetimepicker" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Data/Time</label>
						<input type="datetime-local" name="arrival_datetime" id="" class="form-control datetimepicker" value="">
					</div>
				</div>
				
			</div>
			<div class="row form-group return_trip">
			    <div class="col-md-6">
					<div class="return">
						<label for="">Return Data/Time</label>
						<input type="datetime-local" name="return_datetime" id="" class="form-control datetimepicker" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Arrival Data/Time</label>
						<input type="datetime-local" name="arrival_datetime2" id="" class="form-control datetimepicker" value="">
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="">
						<label for="">Seats</label>
						<input name="seats" id="" type="number" step="any" class="form-control text-right" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="">
						<label for="">Price</label>
						<input name="price" id="" type="number" step="any" class="form-control text-right" value="">
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="submit">Save</button>
      </div> -->
    </div>
  </div>
</div>

 



