<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './misc/phpmailer/vendor/autoload.php'; // Adjust the path as needed to autoload.php
require_once 'Datahandler.php';
require 'misc/config.php';

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
                case 'mijnwerk':
                    $this->mijnwerk();
                    break;
                case 'overmij':
                    $this->overmij();
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

    public function mijnwerk()
    {
        $html = '';
        $html .= '     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h2>Mijn Werk</h2>';
        $html .= '    <p>Ik zal op deze pagina uitleg geven over wat ik allemaal gedaan heb voor werk en oprdachten.</p>';
        $html .= '  </div>';
        $html .= '  <div class="card">';
        $html .= '    <h2>Github Projecten</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Mijn Portfolio Website</h3>';
        $html .= '    <p>Ik wil graag beginnen met u mijn nieuwste project te laten zien, namelijk mijn eigen portfolio website.<br>
                        Hier kunt u bekijken wat ik heb gemaakt en een kijkje nemen in de achterliggende code.<br>
                        </p>';
        $html .= '    <div class="link"><a target="_blank" href="https://github.com/Tjoeser/mijnportfolio">Mijn Portfolio bekijken op Github</a></div>';
        $html .= '    <p>
                        Dit project is tot stand gekomen met de kennis die ik tijdens mijn lessen heb opgedaan.<br>
                        Ik heb hulp gezocht door het doorlichten van mijn eigen code en een eenvoudigere versie ervan gemaakt voor een simpele "low traffic" site.<br><br>
                        Daarnaast heeft Chat GPT me geholpen om mijn mailsysteem werkend te krijgen (dat bleek wat ingewikkelder dan gedacht).<br>
                        Het heeft zelfs wat CSS-styling bedacht voor mijn website, wat ik een leuke uitdaging vond.<br><br>
                        Al met al was dit project niet alleen leuk om te doen, maar het bracht ook onverwachte uitdagingen met zich mee.<br>
                        Ik hoop dat u ervan geniet!
                        </p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Examen jaar op school</h3>';
        $html .= '    <p>
                        Ik wil graag de opdrachten met u delen die ik heb bewaard voor mijn derde en tevens examenjaar.<br>
                        </p>';
        $html .= '    <div class="link"><a target="_blank" href="https://github.com/Tjoeser/3eJaarSchool">Mijn examen jaar opdrachten bekijken op Github</a></div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4>MVC</h4>';
        $html .= '    <p>
                        Als eerste bied ik u een map met MVC-opdrachten aan.<br><br>
                        Hier ziet u onze klassikale poging om een MVC-website te maken. MVC staat voor Model, View, Controller, en het is een structuur om websites te bouwen.<br>
                        Hoewel de meeste code door mij is geschreven, kreeg ik zo nu en dan wat hulp van medeleerlingen (want van mijn docent kon ik dat niet echt verwachten).<br><br>
                        De code in deze repository heeft als inspiratie gediend voor de code van de website waarop u zich nu bevindt.<br>
                        Daarom kan ik met zekerheid zeggen dat dit een leerzame opdracht was.
                        </p>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Stenniz workshop stage</h3>';
        $html .= '    <p>
                        Hier deel ik de code van een oude stage die ik heb gelopen bij Stenniz Workshops.<br>
                        </p>';
        $html .= '    <div class="link"><a target="_blank" href="https://github.com/Tjoeser/mvc_stagesite">Mijn werk aan de stage repository bekijken op Github</a></div>';
        $html .= '    <p>
                        Deze repository is niet van mij, maar bevat wel enkele sporen van mijn code.<br><br>
                        De repository is gemaakt door een mede-stagiair die al vertrokken was voordat ik begon.<br>
                        De website was nogal rommelig en de code was verre van perfect. <br>
                        De repository zelf was ook behoorlijk chaotisch.<br><br>
                        Ik en twee klasgenoten, die ook mijn mede-stagiairs waren, hebben ons uiterste best gedaan om het geheel wat te verbeteren.<br>
                        </p>';
        $html .= '    <div class="link"><a href="https://mail.google.com/mail/u/0/#inbox">Voor meer informatie over deze stage kunt u hier kijken!</a></div>';
        $html .= '    <p>Ik ben niet bijzonder trots op deze repository, maar het was toch een belangrijke stap in mijn ontwikkeling</p>';
        $html .= ' </div>';
        $html .= '</div>';
        $html .= '  <div class="card">';
        $html .= '    <h2>Stage</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Mijn VMBO stages</h3>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4>Doppio Espresso</h4>';
        $html .= '    <p>
                        Mijn allereerste stage op het VMBO was gericht op de horeca. <br><br>
                        Dat kwam doordat ik zelf nog niet zeker wist of ik de ICT in wilde of de horeca.<br>
                        Nu kan ik met zekerheid zeggen dat ik dat nu wel weet (een tip: het is niet de horeca). <br><br>
                        Maar desalniettemin heb ik nu wel ervaring opgedaan met klanten, kassa-gebruik, hygiëne, en andere basisprincipes.<br><br>
                        Dus ik ben toch dankbaar voor de ervaring die ik hier heb opgedaan. <br><br>
                        Er is me zelfs een baan aangeboden die ik echter niet lang heb gehouden vanwege de coronasituatie.<br>
                        </p>';
        $html .= '    <div class="link"><a target="_blank" href="https://www.doppio-espresso.nl/">Bezoek de website!</a></div>';
        $html .= '  </div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4>Movactor/Buurtplein Doorslag</h4>';
        $html .= '    <p>
                        Mijn tweede stage heeft zich volledig gericht op het gebied van ICT.<br><br>
                        In deze stage begon ik met het assisteren van mijn begeleider bij het draaiende houden van het "buurtplein".<br><br>
                        Voor de duidelijkheid, ik en mijn baas werkten voor een bedrijf genaamd Movactor, dat samenwerkte met het bedrijf Buurtpleinen om locaties te creëren en te onderhouden. <br><br>
                        Buurtpleinen was als het ware de body, terwijl Movactor de brain was.<br><br>
                        Nadat ik mijn baas een tijdje had geholpen en tegelijkertijd mijn eigen workshop genaamd "Computerhulp" had opgezet, begon ik eindelijk met mijn eigen taken.<br><br>
                        In deze workshop was mijn hoofdtaak om mensen, voornamelijk ouderen, te helpen met hun ICT-gerelateerde problemen.<br>
                        En met "mensen" bedoel ik eigenlijk één persoon.<br><br>
                        Desondanks had ik na verloop van tijd een leuk aantal terugkerende gezichten in mijn workshop. <br>
                        Dus, met zekerheid kan ik zeggen dat ik veel heb geleerd over geduldig omgaan met oudere mensen en hen helpen met hun ICT-problemen.<br><br>
                        Ook hier kreeg ik een aanbod voor een terugkerende stageplek, maar helaas is dit vanwege de tweede golf van de coronapandemie niet doorgegaan.
                        </p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4>Kruidvat</h4>';
        $html .= '    <p>
                        Als eerste bied ik u een map met MVC-opdrachten aan.<br><br>
                        Hier ziet u onze klassikale poging om een MVC-website te maken. MVC staat voor Model, View, Controller, en het is een structuur om websites te bouwen.<br>
                        Hoewel de meeste code door mij is geschreven, kreeg ik zo nu en dan wat hulp van medeleerlingen (want van mijn docent kon ik dat niet echt verwachten).<br><br>
                        De code in deze repository heeft als inspiratie gediend voor de code van de website waarop u zich nu bevindt.<br>
                        Daarom kan ik met zekerheid zeggen dat dit een leerzame opdracht was.
                        </p>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= ' </div>';
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



    public function contact()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
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
