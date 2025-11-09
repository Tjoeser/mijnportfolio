<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
var_dump($_SESSION);

require '../misc/config.php';
include 'functions.php';
include 'display.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">

	<title>Fitness tracker</title>
</head>
<body>

<div id="flex">
	<div id='left'>
	</div>

	<div id='center'>
		<?php
			displayMaintenanceCalculator();
			if (isset($_SESSION['maintenance_calories'])) {
				echo "<p>Your maintenance calories: " . $_SESSION['maintenance_calories'] . " kcal/day</p>";
				unset($_SESSION['maintenance_calories']); // clear so it doesn’t repeat forever
			}

			if (isset($_SESSION['error'])) {
				echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
				unset($_SESSION['error']);
			}

			if (isset($_SESSION['login_success'])) {
				echo "<p style='color:green'>Login successful!</p>";
				unset($_SESSION['login_success']);
			}
			?>
	</div>

		<div id="right">
			<?php if (!isset($_SESSION['user_id'])): ?>
				<p>1</p>
				<a href="#" class="" onclick="toggleProfileForm()">Login</a>
				<div id="profileForm" style="display:none; margin-top:10px; padding:10px;" class="">
				<form method="post" action="">
					<label for="firstname">First Name</label>
					<input class="w3-input w3-margin-bottom" type="text" id="firstname" name="firstname" required>

					<label for="lastname">Last Name</label>
					<input class="w3-input w3-margin-bottom" type="text" id="lastname" name="lastname" required>

					<label for="password">Password</label>
					<input class="w3-input w3-margin-bottom" type="password" id="password" name="password" required>

					<button type="submit" class="w3-button w3-blue">Save</button>
				</form>
			</div>
			<?php else: ?>
				<a href="#" class="" onclick="toggleProfileForm()">Settings</a>
				<div id="profileForm" style="display:none; margin-top:10px; padding:10px;" class="">
					<form method="post" action="">
						<label for="gender">Gender</label>
						<select class="w3-input w3-margin-bottom" id="gender" name="gender" required>
							<option value="" disabled selected>Select your gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>

						<label for="age">Age</label>
						<input class="w3-input w3-margin-bottom" type="number" id="age" name="age" min="0" max="120" required>

						<label for="height">Height (cm)</label>
						<input class="w3-input w3-margin-bottom" type="number" id="height" name="height" min="50" max="300" step="1" required>

						<button type="submit" class="w3-button w3-blue">Save</button>
					</form>
				</div>
		<a href="#" class="">Logout</a>
	<?php endif; ?>

	</div>

</div>



</body>

</html>

<script>
	function toggleProfileForm() {
	const form = document.getElementById("profileForm");
	form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
}
</script>
