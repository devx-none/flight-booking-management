

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Flight List</b>
				</large>
				<button class="btn btn-primary btn-block col-md-2 float-right" type="button" id="new_flight"><i class="fa fa-plus"></i> New Flight</button>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="flight-list">
					<colgroup>
						<col width="10%">
						<col width="35%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="10%">
						<col width="15%">
					</colgroup>
					<thead>
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
					<tbody>
						
						 <tr>
						 	
						 	<td></td>
						 	<td>
						 		<div class="row">
						 		<div class="col-sm-4">
						 			<img src="../assets/img/" alt="" class="btn-rounder badge-pill">
						 		</div>
						 		<div class="col-sm-6">
						 		<p>Airline :<b></b></p>
						 		<p><small>Airline :<b></small></b></p>
						 		<p><small>Location :<b></small></b></p>
						 		<p><small>Departure :<b></small></b></p>
						 		<p><small>Arrival :<b></small></b></p>
						 		</div>
						 		</div>
						 	</td>
						 	<td class="text-right"></td>
						 	<td class="text-right"></td>
						 	<td class="text-right"></td>
						 	<td class="text-right"></td>
						 	<td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_flight" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_flight" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						
					</tbody>
				</table>
			</div>
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