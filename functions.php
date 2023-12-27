<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'Datahandler.php';
class Functions
{

    private $DataHandler;
    private $live;
    private $DB_HOST;
    private $DB_DRIVER;
    private $DB_NAME;
    private $DB_USERNAME;
    private $DB_PASSWORD;


    public function __construct()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $currentUrl = $_SERVER['REQUEST_URI'];

        if (strpos($currentUrl, 'mijnportfolio') == true) {
            $this->live = false;
        } else {
            $this->live = true;
        }


        if ($this->live == true){
            $this->DataHandler = new DataHandler(DB_HOST_LIVE, DB_DRIVER_LIVE, DB_NAME_LIVE, DB_USERNAME_LIVE, DB_PASSWORD_LIVE);
            $this->DB_HOST = DB_HOST_LIVE;
            $this->DB_DRIVER = DB_DRIVER_LIVE;
            $this->DB_NAME = DB_NAME_LIVE;
            $this->DB_USERNAME = DB_USERNAME_LIVE;
            $this->DB_PASSWORD = DB_PASSWORD_LIVE;
        }
        else{
            $this->DataHandler = new DataHandler(DB_HOST, DB_DRIVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->DB_HOST = DB_HOST;
            $this->DB_DRIVER = DB_DRIVER;
            $this->DB_NAME = DB_NAME;
            $this->DB_USERNAME = DB_USERNAME;
            $this->DB_PASSWORD = DB_PASSWORD;
        }
    }

    public function __destruct()
    {
    }

    public function contactprocess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_POST['fname'];
            $preposition = $_POST['preposition'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $company = $_POST['company'];
            $subject = $_POST['subject'];
            $currentdate = date("H:i j-n-Y");
        
            if (empty($email)) {
                $emailErr = "Email is vereist";
            } else {
                $email = $this->test_input($email);
        
                // Check if email address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Geen geldig e-mailadres";
                } else {
                    $emailErr = "Email is succesvol verzonden";
        
                    // Check if other required fields are not empty
                    if (empty($fname) || empty($lname) || empty($email) || empty($company) || empty($subject)) {
                        $emailErr = "U mist een of meerdere velden";
                    } else {
                        // Establish a connection to your database (replace with your actual connection details)
                        $mysqli = new mysqli($this->DB_HOST, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_NAME);
        
                        // Check the connection
                        if ($mysqli->connect_error) {
                            die("Connection failed: " . $mysqli->connect_error);
                        }
        
                        // Use a prepared statement with parameter binding
                        $stmt = $mysqli->prepare("INSERT INTO contact_subs (fname, preposition, lname, email, company, subject, datetime) VALUES(?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssssss", $fname, $preposition, $lname, $email, $company, $subject, $currentdate);
                        $stmt->execute();
                        $stmt->close();
        
                        // Close the database connection
                        $mysqli->close();
                    }
                }
        
                if ($emailErr == "Email is succesvol verzonden") {
                    $fullname = $fname . ' ' . $preposition . ' ' . $lname;
                    $content = 'Bedrijf: ' . $company . "\n" . 'Vraag: ' . $subject;
                    $this->Sendemail($email, $fullname, $content);
                }
            }
        
            $html = '';
            $html .= '<div class="row">';
            $html .= '  <div class="homecard">';
            $html .= '    <p>' . $emailErr . '</p>';
            $html .= '    <div class="link"><a href="index.php?op=contact">Terug</a></div>';
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        }
    }

    public function loginprocess($username, $password)
    {
        // var_dump($this->live);
        if ($username == ADMIN_UN && $password == ADMIN_PW) {
            $this->cookie("adminlogin", $username);
            $html = '';
            $html .= '<div class="row">';
            $html .= '  <div class="homecard">';
            $html .= '    <p>U bent succesvol ingelogd admin</p>';
            $html .= '      <form action="index.php?op=admin&case=true" method="post">';
            $html .= '          <input type="submit" value="verder">';
            $html .= '      </form>';
            $html .= '  </div>';    
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        } else {
            $html = '';
            $html .= '<div class="row">';
            $html .= '  <div class="homecard">';
            $html .= '    <p>U bent geen admin</p>';
            $html .= '      <form action="index.php?op=admin" method="post">';
            $html .= '          <input type="submit" value="terug">';
            $html .= '      </form>';
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        }
    }


    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function Sendemail($email, $fullname, $content)
    {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = APP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = APP_UN;
        $mail->Password = APP_PW; // Use the App Password
        $mail->SMTPSecure = 'ssl/tls'; // or 'ssl' for SSL
        $mail->Port = 587;

        $mail->setFrom($email, $fullname); // Set "From" to your Gmail address
        $mail->addAddress(APP_EMAIL, APP_RECIEVER); // Recipient's address

        $mail->isHTML(false); // Set to true for HTML emails
        $mail->Subject = 'Contact Form Submission from ' . $email;
        $mail->Body = $content;

        if ($mail->send()) {
        } else {
        }
    }

    public function adminreadfunction($result, $case)
    {
        $uniquecolumn = "id";
        $tableheader = false;
        if ($case == 0){
            $html = "<div class='content'>";
            $html .= "<table>";
            foreach ($result as $row) {
                if ($tableheader == false) {
                    $html .= "<tr>";
                    foreach ($row as $key => $value) {
                        $html .= "<th data-title='{$key}'>" . $key . "</th>";
                    }
                    $html .= "<th data-title='actions'>actions</th>";
                    $html .= "</tr>";
                    $tableheader = true;
                }
                $html .= "<tr>";
                foreach ($row as $key => $value) {
                    $html .= "<td data-title='{$key}'>" . $value . "</td>";
                }
                $currentUrl = $_SERVER['REQUEST_URI'];
                if (strpos($currentUrl, 'id') == true) {
                    $html .= '     <td>';
                    $html .= "<a class=\"crudfunctionbutton\" href='index.php?op=actions&act=update&id={$row[$uniquecolumn]}'><i class='fa fa-wrench'>Update</i></a>";
                } else {
                    $html .= "<td><a class=\"crudfunctionbutton\" href='index.php?op=actions&act=read&id={$row[$uniquecolumn]}'><i class='fa fa-pencil'>Read</i></a>";
                }
                $html .= "<a class=\"crudfunctionbutton\" href='index.php?op=actions&act=delete&id={$row[$uniquecolumn]}'><i class='fa fa-trash'>Delete</i></a>";
                if (strpos($currentUrl, 'id') == true) {
                    $email = $row['email'];
                    $html .= '     <button data-text="' . $email . '" class="emailbutton2">Kopieer dit e-mailadres</button>';
                    $html .= '     <p id="succesmessage">E-mailadres is succesvol gekopieerd</p></td>';
                }
                $html .= "<tr>";
            }
            $html .= "</table></div><br>";
        }
        if ($case == 1){
            $columnsToSkip = ['id', 'columnName2', 'columnName3'];
            
            $html = "<div class='content'>";
            $html .= "<table>";
            foreach ($result as $row) {
                if ($tableheader == false) {
                    $html .= "<tr>";
                    foreach ($row as $key => $value) {
                        // Skip columns listed in $columnsToSkip array
                        if (!in_array($key, $columnsToSkip)) {
                            $html .= "<th data-title='{$key}'>" . $key . "</th>";
                        }
                    }
                    $html .= "<th style='width:208px;' data-title='actions'>actions</th>";
                    $html .= "</tr>";
                    $tableheader = true;
                }
            
                $html .= "<tr>";
                foreach ($row as $key => $value) {
                    // Skip columns listed in $columnsToSkip array
                    if (!in_array($key, $columnsToSkip)) {
                        $html .= "<td data-title='{$key}'>" . $value . "</td>";
                    }
                }
            
                $currentUrl = $_SERVER['REQUEST_URI'];
                if (strpos($currentUrl, 'id') == true) {
                    $html .= '     <td>';
                    $html .= "<a class=\"crudfunctionbutton\" href='index.php?op=actions&act=update&id={$row[$uniquecolumn]}'><i class='fa fa-wrench'></i>Update</a>";
                } else {
                    $html .= "<td><a class=\"crudfunctionbutton\" href='index.php?op=actions&act=read&id={$row[$uniquecolumn]}'><i class='fa fa-pencil'></i> Read</a>";
                }
            
                $html .= "<a class=\"crudfunctionbutton\" href='index.php?op=actions&act=delete&id={$row[$uniquecolumn]}'><i class='fa fa-trash'></i> Delete</a>";
            
                if (strpos($currentUrl, 'id') == true) {
                    $email = $row['email'];
                    $html .= '     <button data-text="' . $email . '" class="emailbutton2">Kopieer dit e-mailadres</button>';
                    $html .= '     <p id="succesmessage">E-mailadres is succesvol gekopieerd</p></td>';
                }
            
                $html .= "<tr>";
            }
            $html .= "</table></div><br>";
            
        }
        return $html;
    }


    public function currentAgeCount()
    {
        $datetime = new DateTime();

        $birtdatea = $datetime->setDate(2005, 02, 03);

        $birtdateb = new DateTime($birtdatea->format('Y-m-d'));
        $currentdate = new DateTime(date("Y-m-d"));
        $interval = $birtdateb->diff($currentdate);
        $diffInYears = $interval->y; //1        

        return $diffInYears;
    }

    public function read($id)
    {
        $sql = "SELECT * FROM contact_subs WHERE id = $id";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function readall()
    {
        $sql = "SELECT id, fname, lname, company, subject FROM contact_subs";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();
        return $res;
    }

    public function update($id)
    {
        $sql = "SELECT * FROM contact_subs WHERE id = $id";
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        $html = '';
        $html .= '<div class="row">';
        $html .= '  <div class="homecard">';
        $html .= "<form action='' method='post'>";
        $html .= "<label>fname</label>";
        $html .= "<input type='text' name='fname' value='{$res[0]['fname']}'>";
        $html .= "<label>preposition</label>";
        $html .= "<input type='text' name='preposition' value='{$res[0]['preposition']}'>";
        $html .= "<label>lname</label>";
        $html .= "<input type='text' name='lname' value='{$res[0]['lname']}'>";
        $html .= "<label>email</label>";
        $html .= "<input type='text' name='email' value='{$res[0]['email']}'>";
        $html .= "<label>company</label>";
        $html .= "<input type='text' name='company' value='{$res[0]['company']}'>";
        $html .= "<label>subject</label>";
        $html .= "<input type='text' name='subject' style='height:200px' value='{$res[0]['subject']}'>";
        $html .= "<input type='hidden' name='id' value='{$res[0]['id']}'>";
        $html .= "<input type='submit' name='submit' value='Opslaan'>";
        $html .= "<a class='button' href='index.php?op=actions&act=read&id=$id'>back</a>";
        $html .= "</form>";
        $html .= "</div>";
        $html .= "</div>";
        echo $html;

        if (isset($_POST['submit'])) {
            $fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
            $preposition = isset($_REQUEST['preposition']) ? $_REQUEST['preposition'] : '';
            $lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
            $company = isset($_REQUEST['company']) ? $_REQUEST['company'] : '';
            $subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : '';
            $sql = "UPDATE `contact_subs` SET `fname` = '" . $fname . "', `preposition` = '" . $preposition . "', `lname` = '" . $lname . "', `email` = '" . $email . "', `company` = '" . $company . "', `subject` = '" . $subject . "' WHERE id=" . $id;
            $result = $this->DataHandler->readsData($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            header("Location: index.php?op=actions&act=read&id=$id");
            $res = $result->fetchAll();
            return $res;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE  FROM contact_subs WHERE id = $id";
        $result = $this->DataHandler->deleteData($sql);

        $html = '';
        $html .= '<div class="row">';
        $html .= '  <div class="homecard">';
        $html .= '    <h2>Succesvol verwijderd u wordt zo terug gestuurd</h2>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
        ?>
      <script>
         setTimeout(function(){
            window.location.href = 'index.php?op=admin&case=true';
         }, 1500);
      </script>
         <?php
    }

    public function cookie($cookietype, $username){
        $cookie_name = $cookietype;
        $cookie_value = $username;
        if ($cookie_name == "visitorcookie"){
            setcookie($cookie_name, $cookie_value, time() + (86400 * 14), "/"); // 86400 = 1 day
        }else{
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day 
        }
    }

    public function deletecookie(){
        setcookie("userLoggedIn", "", time() - 3600);
        echo "Cookie is deleted.";
    }
}
?>