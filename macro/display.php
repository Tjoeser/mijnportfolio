
<?php

function displayMaintenanceCalculator() {
	$age = $_SESSION['age'] ?? 20;
	$gender = $_SESSION['gender'] ?? 'male';
	$height = $_SESSION['height'] ?? 185;
	$weight = $_SESSION['weight'] ?? 88.7;
	$activityLevel = $_SESSION['activity_level'] ?? 'light';
	
?>
	<h2>Maintenance Calories Calculator</h2>
	<form method="post" action="">
		<label for="age">Age (years):</label>
		<input type="number" id="age" name="age" value="<?php echo $age; ?>" required>

		<label for="gender">gender:</label>
		<select id="gender" name="gender">
			<option value="male" <?php echo ($gender === 'male') ? 'selected' : ''; ?>>Male</option>
			<option value="female" <?php echo ($gender === 'female') ? 'selected' : ''; ?>>Female</option>
		</select>

		<label for="height">Height (cm):</label>
		<input type="number" id="height" name="height" value="<?php echo $height; ?>" required>

		<label for="weight">Weight (kg):</label>
		<input type="number" step="0.1" id="weight" name="weight" value="<?php echo $weight; ?>" required>

		<label for="activity">Activity Level:</label>
		<select id="activity" name="activity">
			<option value="sedentary" <?php echo ($activityLevel === 'sedentary') ? 'selected' : ''; ?>>Sedentary (little/no exercise)</option>
			<option value="light" <?php echo ($activityLevel === 'light') ? 'selected' : ''; ?>>Light (1–3 days/week)</option>
			<option value="moderate" <?php echo ($activityLevel === 'moderate') ? 'selected' : ''; ?>>Moderate (3–5 days/week)</option>
			<option value="active" <?php echo ($activityLevel === 'active') ? 'selected' : ''; ?>>Active (6–7 days/week)</option>
			<option value="very" <?php echo ($activityLevel === 'very') ? 'selected' : ''; ?>>Very Active (physical job + training)</option>
		</select>

		<button type="submit">Calculate</button>
	</form>
<?php
}

function displayProfileForm() {
?>


<?php

}
?>
