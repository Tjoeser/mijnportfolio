<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'Datahandler.php';

class Functions{

    private $DataHandler;

	public function __construct()
	{
        $this->DataHandler = new DataHandler("localhost", "mysql", "mijnportfolio_db", "root", "");
	}

	public function __destruct(){

    }

    public function contactprocess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_REQUEST['fname'];
            $preposition = $_REQUEST['preposition'];
            $lname = $_REQUEST['lname'];
            $email = $_REQUEST['email'];
            $company = $_REQUEST['company'];
            $subject = $_REQUEST['subject'];

            if (empty($email)) {
                $emailErr = "Email is vereist";
                $html = '';
                $html .= '<div class="row">';
                $html .= '<div class="leftcolumn">';
                $html .= '  <div class="homecard">';
                $html .= '    <p>' . $emailErr . '</p>';
                $html .= '    <div class="link"><a href="index.php?op=contact">Terug</a></div>';
                $html .= '  </div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                echo $html;
            } else {
                $email = $this->test_input($email);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Geen geldig e-mailadres";
                } else {
                    $emailErr = "Email is succesvol verzonden";
                    if (empty($fname) or empty($lname) or empty($email) or empty($company) or empty($subject)) {
                        $emailErr = "U mist een of meerdere velden";
                    } else {
                        $sql = "INSERT INTO contact_subs (fname, preposition, lname, email, company, subject) VALUES('$fname', '$preposition', '$lname', '$email', '$company', '$subject')";
                        $this->DataHandler->createData($sql);
                    }
                }
                if ($emailErr == "Email is succesvol verzonden") {
                    $fullname = $fname . ' ' . $preposition . ' ' . $lname;
                    $content = 'Bedrijf: ' . $company . "\n" . 'Vraag: ' . $subject;
                    $this->Sendemail($email, $fullname, $content);
                }
                $html = '';
                $html .= '<div class="row">';
                $html .= '<div class="leftcolumn">';
                $html .= '  <div class="homecard">';
                $html .= '    <p>' . $emailErr . '</p>';
                $html .= '    <div class="link"><a href="index.php?op=contact">Terug</a></div>';
                $html .= '  </div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '</div>';
                echo $html;
            }
        }
    }

    public function loginprocess($username, $password)
    {
        $adminusername = ADMIN_UN;
        $adminpassword = ADMIN_PW;

        if ($username == $adminusername && $password == $adminpassword) {
            $html = '';
            $html .= '<div class="row">';
            $html .= '<div class="leftcolumn">';
            $html .= '  <div class="homecard">';
            $html .= '    <p>U bent succesvol ingelogd admin</p>';
            $html .= '      <form action="index.php?op=admin&case=true" method="post">';
            $html .= '          <input type="submit" value="verder">';
            $html .= '      </form>';
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        } else {
            $html = '';
            $html .= '<div class="row">';
            $html .= '<div class="leftcolumn">';
            $html .= '  <div class="homecard">';
            $html .= '    <p>U bent geen admin</p>';
            $html .= '      <form action="index.php?op=admin" method="post">';
            $html .= '          <input type="submit" value="terug">';
            $html .= '      </form>';
            $html .= '  </div>';
            $html .= '</div>';
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
        $AppPassword = APP_PW;

        // Enable debugging (optional)
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'thijs0302@gmail.com';
        $mail->Password = $AppPassword; // Use the App Password
        $mail->SMTPSecure = 'tls'; // or 'ssl' for SSL
        $mail->Port = 587;

        $mail->setFrom($email, $fullname); // Set "From" to your Gmail address
        $mail->addAddress('thijs0302@gmail.com', 'Thijs Rietveld'); // Recipient's address

        $mail->isHTML(false); // Set to true for HTML emails
        $mail->Subject = 'Contact Form Submission from ' . $email;
        $mail->Body = $content;

        if ($mail->send()) {
        } else {
        }
    }

    public function readDataAndPutInTable()
    {
        $sql = "SELECT * FROM contact_subs";
        $this->DataHandler->readsData($sql);
        $result = $this->DataHandler->readsData($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $tableheader = false;
        $html = "<div class='content'>";
        $html .= "<table>";
        $html .= "<br>";
        $html .= "<br>";
        $html .= "<br>";
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
            // $html .= "<td><a class=\"crudfunctionbutton\" href='index.php?op={$controller}&act=read&id={$row[$uniquecolumn]}'><i class='fa fa-pencil'></i> Read</a>";
            // $html .= "<a class=\"crudfunctionbutton\" href='index.php?op={$controller}&act=update&id={$row[$uniquecolumn]}'><i class='fa fa-wrench'></i>Update</a>";
            // $html .= "<a class=\"crudfunctionbutton\" href='index.php?op={$controller}&act=delete&id={$row[$uniquecolumn]}'><i class='fa fa-trash'></i> Delete</a></td>";
            $html .= "<tr>";
        }
        $html .= "</table></div><br>";
        return $html;
    }


    public function currentAgeCount()
    {
        $datetime = new DateTime(); 

        $birtdatea = $datetime->setDate(2005, 03, 02); 
        
        $birtdateb = new DateTime($birtdatea->format('Y-m-d'));
        $currentdate = new DateTime(date("Y-m-d"));
        $interval = $birtdateb->diff($currentdate);
        $diffInYears = $interval->y; //1        

        return $diffInYears;
    }


}
?>
