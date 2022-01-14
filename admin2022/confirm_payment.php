<?php

if (!isset($_GET['trx'] || empty($_GET['trx']))){

	?>

	<script>
		alert("No Refrence No. Supplied");
		window.location.href="withdraw_request.php";
	</script>

	<?php
}

else{

	$trx=$_GET['trx'];
	$sel=mysqli_query($db, "SELECT * FROM withdraw_request WHERE trx='".$trx."'");
	if (mysqli_num_rows($sel)<1){

	?>
	<script>
		alert("No Refrence No. Found");
		window.location.href="withdraw_request.php";
	</script>

	<?php
	}

	else{

		mysqli_query($db, "UPDATE withdraw_request SET status='Successful' WHERE trx='".$trx."'");
		$update=mysqli_query($db, "UPDATE mytransaction SET status='Successful' WHERE trx='".$trx."'");

	if ($update){

		?>

	<script>
		alert("Confirm Successful");
		window.location.href="withdraw_request.php";
	</script>
		<?php
	}

	else{

		?>

	<script>
		alert("Error Verifying Account");
		window.location.href="withdraw_request.php";
	</script>

		<?php
	  }
	}
}
?>