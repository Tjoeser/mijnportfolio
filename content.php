<?php


require './misc/phpmailer/vendor/autoload.php'; // Adjust the path as needed to autoload.php

require_once 'functions.php';
require 'misc/config.php';

class ContentController
{

    private $Functions;

    public function __construct()
    {

        $this->Functions = new Functions();
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
                case 'mijnschool':
                    $this->mijnschool();
                    break;
                case 'contact':
                    $this->contact();
                    break;
                case 'admin':
                    $admincheck = $case;
                    $this->admin($admincheck);
                    break;
                case 'contactprocess':
                    $this->Functions->contactprocess();
                    break;
                case 'loginprocess':
                    $username = $_REQUEST['username'];
                    $password = $_REQUEST['password'];
                    $this->Functions->loginprocess($username, $password);
                    break;
                case 'actions':
                    $act = isset($_GET['act']) ? $_GET['act'] : '';
                    $id = isset($_GET['id']) ? $_GET['id'] : '';
                    switch ($act) {
                        case 'read':
                            $this->adminread($id);
                            break;
                        case 'update':
                            $this->Functions->update($id);
                            break;
                        case 'delete':
                            $this->Functions->delete($id);
                            break;
                    }
                    break;
                default:
                    $this->home();
            }
        } catch (Exception $e) {
            throw $e;
            echo "tragisch";
        }
    }



    public function home()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '  <div class="homecard">';
        $html .= '    <h2>Welkom op mijn website</h2>';
        $html .= '    <p>Ik heet u graag welkom en kijk gerust rond naar mijn vele prestaties en geschiedenis</p>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }

    public function mijnwerk()
    {
        $html = '';
        $html .= '<div class="row1">';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '          <div class="card">';
        $html .= '              <h1>Hier zal ik vertellen wat ik voor opdacrhten, stages en werk heb gedaan.</h1>';
        $html .= '          </div>';
        $html .= '      </div>';
        $html .= '  <div class="rightcolumn1">';
        $html .= '      <div class="rightcard">';
        $html .= "         <p>De links naar alle pagina's die zijn genoemd in deze tekst bevinden zich in de volgende kaartjes.</p>";
        $html .= '      </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '  <div class="card">';
        $html .= '    <h2 id="githubcard">Github Projecten</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Mijn Portfolio Website</h3>';
        $html .= '    <p>Ik wil graag beginnen met u mijn nieuwste project te laten zien, namelijk mijn eigen portfolio website.<br>
                        Hier kunt u bekijken wat ik heb gemaakt en een kijkje nemen in de achterliggende code.<br>
                        </p>';
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
        $html .= '    <p>
                        Deze repository is niet van mij, maar bevat wel enkele sporen van mijn code.<br><br>
                        De repository is gemaakt door een mede-stagiair die al vertrokken was voordat ik begon.<br>
                        De website was nogal rommelig en de code was verre van perfect. <br>
                        De repository zelf was ook behoorlijk chaotisch.<br><br>
                        Ik en twee klasgenoten, die ook mijn mede-stagiairs waren, hebben ons uiterste best gedaan om het geheel wat te verbeteren.<br>
                        </p>';
        $html .= '    <p>Ik ben niet bijzonder trots op deze repository, maar het was toch een belangrijke stap in mijn ontwikkeling</p>';
        $html .= ' </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '  <div class="rightcolumn1">';
        $html .= '      <div class="rightcard">';
        $html .= '    <div class="link"><a target="_blank" href="https://github.com/Tjoeser/mijnportfolio">Mijn Portfolio bekijken op Github</a></div>';
        $html .= '    <div class="link"><a target="_blank" href="https://github.com/Tjoeser/3eJaarSchool">Mijn examen jaar opdrachten bekijken op Github</a></div>';
        $html .= '    <div class="link"><a target="_blank" href="https://github.com/Tjoeser/mvc_stagesite">Mijn werk aan de stage repository bekijken op Github</a></div>';
        $html .= '    <div class="link"><a href="#stennizworkshops">Voor meer informatie over de Stenniz Workshop stage kunt u hier kijken!</a></div>';
        $html .= '      </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '  <div class="card">';
        $html .= '    <h2 id="stagecard">Stage</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Mijn VMBO stages</h3>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4>Doppio Espresso</h4>';
        $html .= '    <h6>september 2019 tot januari 2020 - januari 2020 tot juni 2020</h6>';
        $html .= '    <p>
                        Mijn allereerste stage op het VMBO was gericht op de horeca. <br><br>
                        Dat kwam doordat ik zelf nog niet zeker wist of ik de ICT in wilde of de horeca.<br>
                        Nu kan ik met zekerheid zeggen dat ik dat nu wel weet (een tip: het is niet de horeca). <br><br>
                        Maar desalniettemin heb ik nu wel ervaring opgedaan met klanten, kassa-gebruik, hygiëne, en andere basisprincipes.<br><br>
                        Dus ik ben toch dankbaar voor de ervaring die ik hier heb opgedaan. <br><br>
                        Er is me zelfs een baan aangeboden die ik echter niet lang heb gehouden vanwege de coronasituatie.<br>
                        </p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4>Movactor/Buurtplein Doorslag</h4>';
        $html .= '    <h6>september 2020 tot juli 2021</h6>';
        $html .= '    <p>
                        Mijn tweede stage heeft zich volledig gericht op het gebied van ICT.<br><br>
                        In deze stage begon ik met het assisteren van mijn begeleider bij het draaiende houden van het "buurtplein".<br><br>
                        Voor de duidelijkheid, ik en mijn baas werkten voor een bedrijf genaamd Movactor, dat samenwerkte met het bedrijf Buurtpleinen om locaties te creëren en te onderhouden. <br><br>
                        Buurtpleinen was als het ware de body, terwijl Movactor de brain was.<br><br>
                        Nadat ik mijn baas een tijdje had geholpen en tegelijkertijd mijn eigen workshop genaamd "Computerhulp" had opgezet, begon ik eindelijk met mijn eigen taken.<br><br>
                        In deze workshop was mijn hoofdtaak om mensen, voornamelijk ouderen, te helpen met hun ICT-gerelateerde problemen.<br>
                        De mensen stroomde nou niet perse binnen maar het was genoeg om elke dag wat te doen.<br><br>
                        Desondanks had ik na verloop van tijd een leuk aantal terugkerende gezichten in mijn workshop. <br>
                        Dus, met zekerheid kan ik zeggen dat ik veel heb geleerd over geduldig omgaan met oudere mensen en hen helpen met hun ICT-problemen.<br><br>
                        Ook hier kreeg ik een aanbod voor een terugkerende stageplek, maar helaas is dit vanwege de tweede golf van de coronapandemie niet doorgegaan.
                        </p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4>Kruidvat</h4>';
        $html .= '    <h6>januari 2020 tot feburauri 2020</h6>';
        $html .= '    <p>
                        Mijn derde stage werd enigszins chaotisch geregeld vanwege de tweede golf van de coronapandemie.<br><br>
                        Daardoor kon ik deze stage slechts voor een korte periode volgen, wat me niet heel erg stoorde.<br><br> 
                        Het betrof namelijk voornamelijk saai vakkenvulwerk met een slecht management, zowel van medewerkers als van producten.<br>
                        Ik heb niet veel positiefs te melden over deze stage, maar toch vind ik dat elke leerervaring waardevol is. <br><br>
                        Deze stage was dan ook kort en werd beëindigd toen we rond februari 2021 voor de tweede keer alles moesten sluiten vanwege de coronasituatie.<br>
                        </p>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Mijn MBO stages</h3>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4 id="stennizworkshops">Stenniz Workshops</h4>';
        $html .= '    <h6>29 augustus 2022 tot 3 februari 2023</h6>';
        $html .= '    <p>
                        Mijn stage bij Stenniz Workshops (ook bekend als Stenniz Music en Stenniz Games) was een interessante stage op meerdere vlakken.<br><br>
                        Ik liep deze stage samen met 2 klasgenoten en een mede-softwareontwikkelaar van een andere opleiding.<br>
                        We hadden geluk dat we deze stage nog op het laatste moment konden regelen, want we zaten al in de zomervakantie en niemand leek ons aan te nemen.<br>
                        Toen gaf een docent ons een nieuw telefoonnummer dat we nog niet hadden geprobeerd. <br><br>
                        Nou ja, the rest was history, zullen we maar zeggen.<br><br>
                        Na de zomervakantie ben ik meteen aan de stage begonnen. <br><br>
                        Deze stage bestond uit 4 dagen thuiswerken en 1 dag per week op "kantoor".<br>
                        "Kantoor" was eigenlijk zijn eigen appartement, maar dat was ook helemaal prima.<br><br>
                        Desondanks was het altijd een fijne en schone plek om te werken, en ook nog eens slechts 5 minuten fietsen, dus dat was een leuke afwisseling.<br><br>
                        In het begin was ik een beetje teleurgesteld in het werk, ik had er namelijk meer van verwacht.<br><br>
                        Maar bij nader inzien heb ik er toch best wel van genoten en was het vooral prettig dat ik mijn programmeerkunsten kon laten zien bij een laagdrempelig bedrijf.<br><br>
                        Mijn stagebegeleider was een interessant figuur, maar ik ben toch blij met de tijd die ik met hem heb kunnen doorbrengen. <br>
                        Communiceren met hem was namelijk best lastig en hij was gek genoeg heel achterdochtig over mij en mijn werk.<br><br>
                        Uiteindelijk heb ik behoorlijk wat geleerd en mogen uitproberen. <br><br>
                        Dus ik ben tevreden.</p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4 id="stennizworkshops">Mijn volgende stage</h4>';
        $html .= '    <h6>5 februari tot 14 juni</h6>';
        $html .= '    <p>
                             Als u overweegt om mij als stagiair aan te nemen voor uw bedrijf, kan ik slechts één ding zeggen: als u het niet probeert, zult u het nooit weten...</p>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn1">';
        $html .= '      <div class="rightcard">';
        $html .= '    <div class="link"><a target="_blank" href="https://www.doppio-espresso.nl/">Bezoek de website van Doppio Espresso!</a></div>';
        $html .= '    <div class="link"><a target="_blank" href="https://www.movactor.nl/">Bezoek de website van Movactor!</a></div>';
        $html .= '    <div class="link"><a target="_blank" href="https://www.stennizworkshops.nl/">Bezoek de Stenniz Workshops website!</a></div>';
        $html .= '      </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '          <div class="card">';
        $html .= '              <h2 id=werkcard>Werk</h2>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3>Krantenwijk</h3>';
        $html .= '                  <p>
                                    Mijn eerste baan was vrij bekend.<br>
                                    De krantenwijk was een eenvoudige klus die ik elke donderdag met mijn vader en mijn zusje deed. <br><br>
                                    Het was geen inspirerend werk, maar toch viel het wel mee.<br><br>
                                    Helaas heb ik niet veel boeiends te vertellen.<br><br>
                                    Ik heb dit 3 jaar volgehouden, en het is tot nu toe mijn langstlopende baan.<br>
                                    </p>';
        $html .= '  </div>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 id=doppioinfo>Doppio Espresso</h3>';
        $html .= '                  <p>
                                    </p>';
        $html .= '  </div>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 id=>Pathe Utrecht Leidscherijn</h3>';
        $html .= '                  <p>
                                    </p>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn1">';
        $html .= '      <div class="rightcard">';
        $html .= '      <p>
                            heloo
                            </p>';
        $html .= '      </div>';
        $html .= '  </div>';
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
        $count = $this->Functions->currentAgeCount();
        $html .= '    <p>ik ben momenteel ' . $count . ' jaar oud</p>';
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

    public function mijnschool()
    {
        $html = '';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h2>Mijn school</h2>';
        $html .= '    <p>Some text..</p>';
        $html .= '    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>';
        $html .= '  </div>';
        $html .= '</div>';

        $html .= '<div class="rightcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <img class="fakeimg" src="media/fotos/Afbeelding1.jpg" alt="Een foto van mij die niet kon inladen">';
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
            $res = $this->Functions->readall();
            $html .= $this->Functions->adminreadfunction($res);
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
    

    public function adminread($id)
    {
            $res = $this->Functions->read($id);
            $html = '';
            $html .= '<div class="row">';
            $html .= '<div class="leftcolumn">';
            $html .= '  <div class="homecard">';
            $html .= $this->Functions->adminreadfunction($res);
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
    }
}
