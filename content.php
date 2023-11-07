<?php
require_once 'Datahandler.php';
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
                case 'contactprocess':
                    $this->contactprocess();
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
        $html .= '          <label for="fullname">Volledige naam</label>';
        $html .= '          <input type="text" id="fullname" name="fname" placeholder="Uw volledige naam...">';
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

    public function contactprocess()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname = $_REQUEST['fname'];
            $email = $_REQUEST['email'];
            $company = $_REQUEST['company'];
            $subject = $_REQUEST['subject'];

            $pieces = explode(" ", $fullname);
            $fname = $pieces[0];
            $lname = $pieces[1];

            $html = '';
            $html .= '<div class="row">';
            $html .= '<div class="leftcolumn">';
            $html .= '  <div class="homecard">';
            $html .= '    <p>Verzoek is succesvol verstuurd!</p>';
            $html .= '    <a href="index.php?op=overmij">Terug</a>';
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;

            if (empty($fname) or empty($lname) or empty($email) or empty($company) or empty($subject)) {
                return "Alle velden zijn vereist";
            } else {
                $sql = "INSERT INTO contact_subs (fname, lname, email, company, subject) VALUES('$fname', '$lname', '$email', '$company', '$subject')";
                $this->DataHandler->createData($sql);
                return 'Successfully created new contact!';
                $html = "<a class=\"crudfunctionbutton\" href='index.php'><i class='fa-solid fa-circle-plus'></i> Home</a>";
                echo $html;
            }


        }
    }
}
