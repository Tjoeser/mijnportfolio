<?php
$live = false;

if (strpos($_SERVER['HTTP_HOST'], 'thefilmton') !== false) {
    $live = true;
}
define('LIVE_MODE', $live);

function setupDatahandlerConnection()
{
    if (!LIVE_MODE) {
        $host = DB_HOST;
        $dbdriver = DB_DRIVER;
        $dbname = DB_NAME;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;
    } else {
        $host = DB_HOST_LIVE;
        $dbdriver = DB_DRIVER_LIVE;
        $dbname = DB_NAME_LIVE;
        $username = DB_USERNAME_LIVE;
        $password = DB_PASSWORD_LIVE;
    }

    try {
        $dbh = new PDO("$dbdriver:host=$host;dbname=$dbname", $username, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh; // Return the PDO instance
    } catch (PDOException $e) {
        echo "Connection with " . $dbdriver . " failed: " . $e->getMessage();
        return null; // Return null if connection fails
    }
}

function setupProfileTableConnection()
{
    $dbh = setupDatahandlerConnection();
    if ($dbh) {
        try {
            $query = "SHOW TABLES LIKE 'fitness_profiles'";
            $stmt = $dbh->query($query);
            $result = $stmt->fetch();

            return $result ? $dbh : null;
        } catch (PDOException $e) {
            echo "Error checking the 'fitness_profiles' table: " . $e->getMessage();
            return null;
        }
    }
    return null;
}

function setupTrackerTableConnection()
{
    $dbh = setupDatahandlerConnection();
    if ($dbh) {
        try {
            $query = "SHOW TABLES LIKE 'fitness_tracker'";
            $stmt = $dbh->query($query);
            $result = $stmt->fetch();

            return $result ? $dbh : null;
        } catch (PDOException $e) {
            echo "Error checking the 'fitness_tracker' table: " . $e->getMessage();
            return null;
        }
    }
    return null;
}

# ===============================
# DATA HANDLER FUNCTIONS
# ===============================

# --- fitness_profiles functions ---
function addProfile($firstname, $lastname, $password, $gender = "", $age = "", $height = "",  $maintenance = "") {
    $dbh = setupProfileTableConnection();
    if (!$dbh) return false;

    $sql = "INSERT INTO fitness_profiles 
            (f_name, l_name, age, gender, height, maintenance, date_submitted, password) 
            VALUES (:f_name, :l_name, :age, :gender, :height, :maintenance, NOW(), :password)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([
        ':f_name'     => $firstname,
        ':l_name'     => $lastname,
        ':age'       => $age,
        ':gender'    => $gender,
        ':height'      => $height,
        ':maintenance' => $maintenance,
        ':password'    => $password,
    ]);

    return $dbh->lastInsertId();
}

function getProfile($firstname, $lastname, $password) {
    $dbh = setupProfileTableConnection();
    if (!$dbh) return null;

    $stmt = $dbh->prepare("SELECT * FROM fitness_profiles WHERE f_name = :f_name AND l_name = :l_name AND password = :password");
    $stmt->execute([':f_name' => $firstname, ':l_name' => $lastname, ':password' => $password]);
    return $stmt->fetch();
}

function getProfiles() {
    $dbh = setupProfileTableConnection();
    if (!$dbh) return [];

    return $dbh->query("SELECT * FROM fitness_profiles ORDER BY date_submitted DESC")->fetchAll();
}

function deleteProfile($id) {
    $dbh = setupProfileTableConnection();
    if (!$dbh) return false;

    $stmt = $dbh->prepare("DELETE FROM fitness_profiles WHERE id = ?");
    return $stmt->execute([$id]);
}

# --- fitness_tracker functions ---
function addTrackerLog($profileId, $maintenance) {
    $dbh = setupTrackerTableConnection();
    if (!$dbh) return false;

    $sql = "INSERT INTO fitness_tracker (profile_id, maintenance, created_at) 
            VALUES (:profile_id, :maintenance, NOW())";
    $stmt = $dbh->prepare($sql);
    return $stmt->execute([
        ':profile_id' => $profileId,
        ':maintenance' => $maintenance
    ]);
}

function getLogsByProfile($profileId) {
    $dbh = setupTrackerTableConnection();
    if (!$dbh) return [];

    $stmt = $dbh->prepare("SELECT * FROM fitness_tracker WHERE profile_id = ? ORDER BY created_at DESC");
    $stmt->execute([$profileId]);
    return $stmt->fetchAll();
}
