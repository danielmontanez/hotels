<?php include_once "includes/_header.php"; ?>

<body class="p-5 mx-auto " style="max-width: 800px;">
	<h1>Hotel Reservations</h1>
	<table class="table table-striped">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Hotel Name</th>
	      <th scope="col">Customer Name</th>
	      <th scope="col">Reservation Approved</th>
	    </tr>
	  </thead>
	  <tbody>
          
		<?php foreach ($reservations as $reservation): 

          ?>
			<tr>
		      <td><?= HotelService::getHotelById($reservation['hotel_id'])->getName() ?></td>
		      <td><?= UserService::getUserById($reservation['user_id'])->getName() ?></td>
		      <td><input id="<?= $reservation['id'] ?>" class="approveCheckbox" type="checkbox" <?= filter_var($reservation['approved'], FILTER_VALIDATE_BOOLEAN) ? 'checked' : '' ?>></td>
		    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>

<a class="btn btn-secondary" href="../../index.php" role="button">Home</a>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
	$('.approveCheckbox').change(function() {
		let reservationId = this.id;
		
		if(this.checked) {
			fetch('../actions/approve.php?approve=true&id=' + reservationId);

		    $(this).attr('checked', true);
		} else {
			fetch('../actions/approve.php?approve=false&id=' + reservationId);
		    $(this).attr('checked', false);
		}
	});
</script>

<?php include_once "includes/_footer.php"; ?>