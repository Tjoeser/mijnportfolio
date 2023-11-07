<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './misc/phpmailer/vendor/autoload.php'; // Adjust the path as needed to autoload.php
require_once 'Datahandler.php';
require 'config.php';

class ContentController
{
    private $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler("localhost", "mysql", "mijnportfolio_db", "root", "");
    }

    public function __destruct()
    {
        // code
    }

    public function handleRequest()
    {
        try {

            $op = isset($_GET['op']) ? $_GET['op'] : '';
            $case = isset($_GET['case']) ? $_GET['case'] : '';
            switch ($op) {
                case 'overmij':
                    $this->overmij();
                    break;
                case 'mijnwerk':
                    $this->mijnwerk();
                    break;
                case 'contact':
                    $this->contact();
                    break;
                case 'admin':
                    $admincheck = $case;
                    $this->admin($admincheck);
                    break;
                case 'contactprocess':
                    $this->contactprocess();
                    break;
                case 'loginprocess':
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['password'];
                    $this->loginprocess($username, $password);
                    break;
                default:
                    $this->home();
            }
        } catch (Exception $e) {
            throw $e;
        }
    }



    public function home()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="homecard">';
        $html .= '    <h2>Welkom op mijn website</h2>';
        $html .= '    <p>Ik heet u graag welkom en kijk gerust rond naar mijn vele prestaties en geschiedenis</p>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }

    public function overmij()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h2>Over mij</h2>';
        $html .= '    <p>Some text..</p>';
        $html .= '    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>';
        $html .= '  </div>';
        $html .= '</div>';

        $html .= '<div class="rightcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <img class="fakeimg" src="media/fotos/Afbeelding1.jpg" alt="Een foto van mij die niet kon inladen">';
        $html .= '  </div>';

        $html .= '  <div class="card">';
        $html .= '    <h3>Mijn sociale links</h3>';
        $html .= '    <div class="link"><a target="_blank" href="https://www.linkedin.com/in/thijs-r/">Linked-In</a></div>';
        $html .= '    <div class="link"><a target="_blank" href="https://github.com/Tjoeser">Github</a></div>';
        $html .= '  </div>';

        $html .= '  <div class="card">';
        $html .= '    <h3>Mijn CV</h3>';
        $html .= '    <div class="link"><a href="media\Curriculum Vitae Thijs Rietveld.pdf" download>Download mijn CV</a></div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }

    public function mijnwerk()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h2>Mijn Werk</h2>';
        $html .= '    <h5>Title description, Dec 7, 2017</h5>';
        $html .= '    <div class="fakeimg" style="height:200px;">Image</div>';
        $html .= '    <p>Some text..</p>';
        $html .= '    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '<div class="rightcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h2>About Me</h2>';
        $html .= '    <div class="fakeimg" style="height:100px;">Image</div>';
        $html .= '    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>';
        $html .= '  </div>';
        $html .= '  <div class="card">';
        $html .= '    <h3>Popular Post</h3>';
        $html .= '    <div class="fakeimg"><p>Image</p></div>';
        $html .= '    <div class="fakeimg"><p>Image</p></div>';
        $html .= '    <div class="fakeimg"><p>Image</p></div>';
        $html .= '  </div>';
        $html .= '  <div class="card">';
        $html .= '    <h3>Follow Me</h3>';
        $html .= '    <p>Some text..</p>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }

    public function contact()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="homecard">';
        $html .= '    <h2>De contact pagina</h2>';
        $html .= '      <form action="index.php?op=contactprocess" method="post">';
        $html .= '          <label for="fname">Voornaam</label>';
        $html .= '          <input type="text" id="fname" name="fname" placeholder="Uw voornaam...">';
        $html .= '          <label for="preposition">Tussenvoegsel</label>';
        $html .= '          <input type="text" id="preposition" name="preposition" placeholder="Uw tussenvoegsel...">';
        $html .= '          <label for="lname">Acternaam</label>';
        $html .= '          <input type="text" id="lname" name="lname" placeholder="Uw achternaam...">';
        $html .= '          <label for="email">E-mail</label>';
        $html .= '          <input type="text" id="email" name="email" placeholder="Uw e-mailadres...">';
        $html .= '          <label for="company">Bedrijf</label>';
        $html .= '          <input type="text" id="company" name="company" placeholder="Uw bedrijfs naam...">';
        $html .= '          <label for="subject">Vraag</label>';
        $html .= '          <textarea id="subject" name="subject" placeholder="Wat is uw vraag?..." style="height:200px"></textarea>';
        $html .= '          <input type="submit" value="Verstuur">';
        $html .= '      </form>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '<div class="rightcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <p>U kunt mij ook een mailtje sturen op dit adress</p>';
        $html .= '     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';
        $html .= '     <button data-text="thijs0302@gmail.com" class="emailbutton">Kopieer mijn e-mailadres</button>';
        $html .= '     <p id="succesmessage">E-mailadres is succesvol gekopieerd</p>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }


    public function admin($admincheck)
    {
        if ($admincheck == true) {
            $html = '';
            $html .= '<div class="row">';
            $html .= '<div class="leftcolumn">';
            $html .= '  <div class="homecard">';
            $html .= '    <h2>welkom admin</h2>';
            $html .= $this->readDataAndPutInTable();
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
            $html .= '    <h2>Login</h2>';
            $html .= '      <form action="index.php?op=loginprocess" method="post">';
            $html .= '          <label for="username">Gebruikersnaam</label>';
            $html .= '          <input type="text" id="username" name="username" placeholder="Uw Gebruikersnaam...">';
            $html .= '          <label for="password">Wachtwoord</label>';
            $html .= '          <input type="text" id="password" name="password" placeholder="Uw wachtwoord...">';
            $html .= '          <input type="submit" value="Verstuur">';
            $html .= '      </form>';
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        }
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
}
