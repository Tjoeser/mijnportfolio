<?php
include 'datahandler.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['age'])) {
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $activityLevel = $_POST['activity'];

        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['height'] = $height;
        $_SESSION['weight'] = $weight;
        $_SESSION['activity_level'] = $activityLevel;

        $maintenance = calculateMaintenanceCalories($age, $gender, $height, $weight, $activityLevel);
        if ($maintenance) {
            $_SESSION['maintenance_calories'] = $maintenance;

            // redirect and stop execution
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=loggeddata");
            exit;
        } else {
            $_SESSION['error'] = "Error calculating maintenance calories. Please check your input values.";
            header("Location: " . $_SERVER['PHP_SELF'] . "?error=1");
            exit;
        }
    }

    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $password  = $_POST['password'];

        loginHandle($firstname, $lastname, $password);

        $_SESSION['login_success'] = true;
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=loggedin");
        exit;
    }
}



function calculateMaintenanceCalories($age, $gender, $height, $weight, $activityLevel) {
	// Step 1: Calculate BMR (Mifflin–St Jeor Equation)
	if (strtolower($gender) === "male") {
		$bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
	} else {
		$bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
	}

	// Step 2: Choose activity multiplier
	$activityMultipliers = [
		"sedentary" => 1.2,
		"light" => 1.375,
		"moderate" => 1.55,
		"active" => 1.725,
		"very" => 1.9
	];

	$multiplier = $activityMultipliers[strtolower($activityLevel)] ?? 1.2; // default sedentary

	// Step 3: Calculate TDEE (maintenance calories)
	$tdee = $bmr * $multiplier;

	return round($tdee);
}

function loginHandle($firstname, $lastname, $password) {
	//check if credentials are valid
	if (empty($firstname) || empty($lastname) || empty($password)) {
		return false;
	}

	//check if credentials exist in database
	$check = getProfile($firstname, $lastname, $password);

	$userid = $check ? $check['id'] : null;
	// var_dump($userid);
	// var_dump($check);

	if ($check) {
		//log in
		// $_SESSION['user'] = $check;
		$_SESSION['user_id'] = $userid;
		var_dump($_SESSION);
	} else {
		$gender = "";
		$age = "";
		$height = "";
		$maintenance = "";

		addProfile($firstname, $lastname, $password, $gender, $age, $height, $maintenance);
	}
	// var_dump($check);
	//if so, log in
	//if not, create account
}


?>
