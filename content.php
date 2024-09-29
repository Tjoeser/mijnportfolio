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
                    // case 'contact':
                    //     $this->contact();
                    //     break;
                case 'admin':
                    $this->admin();
                    break;
                case 'contactprocess':
                    $this->Functions->contactprocess();
                    break;
                case 'createtrip':
                    $this->Functions->createTrip();
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
        $this->Functions->cookie("visitorcookie", "visitor");
        $html = '';
        $html .= '<div class="main-content">';
        $count = $this->Functions->currentAgeCount();
        $html .= '<section id="overmij">';
        $html .= '<div class="row">';
        $html .= '      <div class="column-container1">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h1 class="centerh1">Over mij</h1>';
        $html .= ' <div class="carddivver">';
        $html .= '  <div class="nestedcard">';
        $html .= "    <h2 class='centerh'>Hobby's</h2>";
        $html .= "    <p>
                        Ik hou enorm veel van films en kan dezelfde films opnieuw en opnieuw kijken.<br>
                        Zo hou ik ook met elke nieuwe film mijn Letterboxd bij.<br><br>
                        Gamen vind ik ook ontzettend leuk om te doen, maar denk dan eerder aan story games.<br>
                        Shooters of 2D-games zijn niet echt mijn ding.<br><br>
                        Boeken vind ik ook leuk om te lezen, al lees ik niet zo denderend snel.<br><br>
                        Daarentegen hou ik ook van een wandeling buiten met mijn muziek in mijn oren.<br>
                        Dan hou ik ook van het luisteren naar de soundtracks van mijn favoriete films of series.<br>
        </p>";
        $html .= '  </div>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h2 class="centerh">Korte introductie</h2>';
        $html .= '    
                        Mijn naam is Thijs Rietveld.<br>
                        Ik ben ' . $count . ' jaar oud.<br><br>
                        Deze portfolio website heb ik gebouwd tijdens mijn opleiding en hou ik zo netjes mogelijk bij.<br>
                        Verwacht nog wel wat tweaks aangezien ik nooit tevreden ben met het resultaat.<br><br>
                        Toch ben ik best trots op mijn website.<br>
                        Ik hoop dat u het ook bevalt.<br><br>
        ';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  <div class="card">';
        $html .= '    <h2 class="centerh1" id="githubcard">Github Projecten</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= ' <div class="carddivver">';
        $html .=  $this->card(0, "Mijn Portfolio Website");
        $html .=  $this->card(0, "Examen jaar op school");
        $html .=  $this->card(0, "Stenniz workshop stage");
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
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
        $html .= '    <div class="link"><a href="media\pdf\Curriculum Vitae Thijs Rietveld.pdf" download>Download mijn CV</a></div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';


        $html .= '<section id="mijnwerk">';
        $html .= '<div class="row">';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';

        $html .= '</div>';
        $html .= '  </div>';


        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '  <div class="card">';
        $html .= '    <h2 class="centerh1" id="stagecard">Stage</h2>';

        $html .= '  <div class="nestedcard">';
        $html .= ' <div class="carddivhor">';
        $html .=  $this->card(0, "Mijn VMBO stages");
        $html .=  $this->card(0, "Mijn MBO stages");
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '          <div class="card">';
        $html .= '              <h2 class="centerh1" id=werkcard>Werk</h2>';
        $html .= ' <div class="carddivver">';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 class="centerh">Krantenwijk</h3>';
        $html .= '    <h6 class="date">agusutus 2018 tot juni 2022</h6>';
        $html .= '                  <p>
                                        Mijn allereerste baan is een baan die voor velen bekend is.<br><br>
                                        De krantenwijk.<br><br>
                                        Dit heb ik elke donderdag gedaan voor 3 jaar.<br><br>
                                        Niet zoveel over te melden, maar ik vond dat hij wel genoemd mocht worden, aangezien dit de baan is waar ik tot nu toe het langst aan heb gewerkt.<br><br>
                                    </p>';
        $html .= '  </div>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 class="centerh" id=doppioinfo>Doppio Espresso</h3>';
        $html .= '    <h6 class="date">januari 2020 tot juni 2020</h6>';
        $html .= "                  <p>
                                        De eerste echte baan.<br><br>
                                        Nadat ik hier stage heb gelopen, is mij een baan aangeboden.<br>
                                        Deze nam ik graag aan, aangezien de stage mij prima afging.<br><br>
                                        De werkzaamheden zouden nu ook uitbreiden.<br>
                                        Zo zou ik nu echt koffie mogen maken en al het latte art dat erbij komt kijken.<br><br>
                                        Ik werkte elke zondag van ongeveer 11:00 tot 18:00; toen werkte ik voornamelijk aan het bereiden van de broodjes.<br>
                                        Dit vond ik enorm leuk, ook waren er salades en panini's die ik kon voorbereiden.<br><br>
                                        Naast de koffie en de broodjes moest er uiteraard ook kassa worden gedraaid.<br>
                                        Toentertijd was dit ontzettend nieuw voor mij; ondertussen is kassa geen moeite meer, dankzij Doppio uiteraard.<br>
                                        Ik heb ook tafels schoongemaakt en de zaak geholpen sluiten.<br><br>
                                        Uiteindelijk hebben we vanwege coronaomstandigheden besloten toch onze wegen te splitsen.<br><br>
                                    </p>";
        $html .= '  </div>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 class="centerh">Pathe Utrecht Leidscherijn</h3>';
        $html .= '    <h6 class="date">5 februari 2022 tot 24 februari 2024 </h6>';
        $html .= "                  <p>
                                        Mijn 2e baan die ik had, begon tijdens mijn opleiding op het ROC.<br><br>
                                        Ik dacht al jaren over stage lopen bij Pathé; uiteindelijk had ik wel weer zin om te gaan werken en besloot ik een mail te sturen.<br>
                                        Vervolgens ben ik snel door het traject heen gevlogen en voor ik het wist, stond ik op de werkvloer.<br><br>
                                        Eindelijk een plek waar ik mijn passie tegenkom: films.<br>
                                        Ook heb ik hier mijn beste vrienden ontmoet, die ik zo goed als dagelijks spreek.<br><br>
                                        Het werk bestond uit: kassastaan, zalen schoonmaken, bezoekers helpen en nog veel meer.<br><br>
                                        Achter de kassa verkocht ik kaartjes en hielp ik mensen met enkele problemen die ze hadden.<br>
                                        Bij de bar verkochten we popcorn, drankjes en andere snacks, en uiteraard hygienisch werken.<br>
                                        Bij de ingang van het pand stond ik portier, waar ik kaartjes scande en mensen begroette.<br>
                                        Boven in het pand moesten alle 7 zalen goed schoon zijn en de bezoekers werden begroet aan het einde van de film.<br><br>
                                        Ook hadden we wel eens events waarin een bedrijf een zaal kon huren voor wat voor ideeën dan ook.<br><br>
                                        Dus ik heb heel veel ervaringen meegemaakt en heb dus echt een goed begrip van verschillende bezoekers ontvangen en handelen.<br><br>
                                        Bij Pathé heb ik ook verschillende trainingen gekregen, waaronder agressietrainingen en veiligheidstrainingen.<br><br>
                                        Dus ik ben zeer goed voorbereid, al zeg ik het zelf.<br><br>
                                    </p>";
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';


        $html .= '<section id="mijnschool">';
        $html .= '<div class="row">';
        $html .= '  <div class="card">';
        $html .= '    <h2 class="centerh1">Mijn school</h2>';
        $html .= ' <div class="carddivver">';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h2 class="centerh">Basis Onderwijs</h2>';
        $html .= '<div class="row1">';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn2">';
        $html .= '    <h4>OBS Vleuterweide</h4>';
        $html .= '    <h6 class="date">augustus 2009 tot juni 2017</h6>';
        $html .= '    <p>
                        In mijn tijd op de basisschool heb ik 2 gebouwen gekend.<br><br>
                        Tot en met groep 2 zat ik op de roze school.<br>
                        Daarna ben ik verplaatst naar de zwarte school tot en met groep 8.<br><br>
                        Ik ben hier mijn tijd ontzettend dankbaar, aangezien ze mij hebben leren lezen en schrijven.<br>
                        Als dat niet was gelukt, dan had software best lastig geweest.<br><br>
                        Hier heb ik de CITO-toets afgerond met niveau kader.<br><br>
        </p>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn2">';
        $html .= '    <img src="media/fotos/obsvleuterweide1.jpg" alt="Een foto van mijn basis school die niet kon inladen">';
        $html .= '    <img src="media/fotos/obsvleuterweide2.jpg" alt="Een andere foto van mijn basis school die niet kon inladen">';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h2 class="centerh">VMBO</h2>';
        $html .= '<div class="row1">';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn2">';
        $html .= '    <h4>Wellant College</h4>';
        $html .= '    <h6 class="date">augustus 2017 tot juni 2021</h6>';
        $html .= '    <p>
                        Nadat ik kader heb gekregen op de basisschool, zijn we gaan zoeken naar een geschikte middelbare school.<br>
                        We waren eigenlijk meteen blij met het Wellant College in Montfoort, nu Yuverta genoemd.<br><br>
                        Dit is uiteraard een boerenschool, maar ik en mijn ouders wisten dat een school waarin ik wat met mijn handen kon doen, de beste keuze was.<br><br>
                        Montfoort was wel een goed stuk fietsen in vergelijking met de 5 minuten lopen van de basisschool.<br><br>
                        De vakken bestonden uiteraard uit de standaard theorievakken: biologie, wiskunde, Nederlands, Engels, nask en mens en maatschappij.<br>
                        Maar wat het Wellant uniek maakte, waren de praktijkvakken; deze vakken bestonden uit: dier, food, techniek, groen en bloem en design.<br><br>
                        Erg unieke praktijkvakken waar ik met planten, eten en hout werkte.<br><br>
                        De school duurde 4 jaar en nu ik erop terugkijk, mis ik het uiteraard wel.<br>
                        Hier heb ik dan ook verschillende stages gelopen, maar door corona zijn de laatste 2 jaar een beetje overhoop gegooid.<br>
                        Zo heb ik dus nooit een eindgala gehad en is het schoolreisje naar de Ardennen ook afgekapt.<br><br>
        </p>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn2">';
        $html .= '    <img class=fakeimg1 src="media/fotos/wellantcollege.jpg" alt="Een foto van mijn middelbare school die niet kon inladen">';
        $html .= '    <img class=fakeimg1 src="media/fotos/yuverta.jpg" alt="Nog een foto van mijn middelbare school die niet kon inladen">';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';

        $html .= '  <div class="nestedcard">';
        $html .= '    <h2 class="centerh">MBO</h2>';
        $html .= '<div class="row1">';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn2">';
        $html .= '    <h4>ROC Midden Nederland</h4>';
        $html .= '    <h6 class="date">augustus 2021 tot juni 2024</h6>';
        $html .= '    <p>
                        Dan kom ik eindelijk bij de opleiding.<br><br>
                        Het ROC Midden Nederland had de opleiding Software Development, wat ik heel interessant vond klinken.<br><br>
                        Ik ben meteen contact gaan opnemen en kon uiteraard ook beginnen.<br>
                        Het voelde meteen alsof ik nu echt ergens was waar ik zelf wilde zijn, niet iets dat moest maar iets wat ik wilde.<br><br>
                        Het ROC was mooi en nieuw, en het eerste jaar heb ik heel erg genoten en geleerd.<br>
                        Mijn 2e jaar begon ik met mijn eerste MBO-stage en nadat die klaar was, kwam ik de rest van het halfjaar in de klas afmaken.<br><br>
                        Al was school jammer genoeg best veranderd tegen die tijd; ze hadden besloten om les te geven door middel van een pakket genaamd Bit Academy.<br>
                        Dit was een hele goede website om online programmeeropdrachten te maken en te laten nakijken, ik miste echter de klassikale ervaring.<br><br>
                        Vervolgens was het de helft van het 3e jaar ook weer op school, waarna ik het laatste halfjaar mijn 2e stage ben gaan doen.<br>
                        Ik heb dus grotendeels van mijn eindexamens gemaakt in februari, wat wel vreemd was.<br><br>
                        Mijn vakken tijdens de opleiding waren nog steeds deels theoretisch, bijvoorbeeld: Nederlands, rekenen en Engels.<br>
                        Maar ook had ik in mijn eerste jaar vakken zoals: ICT-Skills, projecten, projectmanagement en Python, die ik ontzettend leuk vond.<br>
                        Na mijn 1e jaar is dit dus helaas veranderd naar een vak dat de hele dag doorging, waarin we dus aan Jarvis werkten, wat een specifiek pakket was van Bit Academy.<br><br>
                        Om het samen te vatten: ik heb leuke mensen ontmoet en mijn passie voor programmeren erg goed kunnen aanwakkeren.<br><br>
        </p>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn2">';
        $html .= '    <img class=fakeimg1 src="media/fotos/ROC.jpg" alt="Een foto van mijn opleiding die niet kon inladen">';
        $html .= '    <img class=fakeimg1 src="media/fotos/roc2.jpg" alt="Een andere foto van mijn opleiding die niet kon inladen">';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</section>';


        $html .= '<section id="contact">';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '<div class="card">';
        $html .= '<h2 class="centerh1">Contact</h2>';
        $html .= '<form action="index.php?op=contactprocess" method="post">';
        $html .= '<div class="form-row">'; // Wrapper for "Voornaam", "Tussenvoegsels", and "Achternaam"
        $html .= '<div><label for="fname">Voornaam</label>';
        $html .= '<input type="text" id="fname" name="fname" placeholder="Uw voornaam..."></div>';
        $html .= '<div><label for="preposition">Tussenvoegsels</label>';
        $html .= '<input type="text" id="preposition" name="preposition" placeholder="Uw tussenvoegsels..."></div>';
        $html .= '<div><label for="lname">Achternaam</label>';
        $html .= '<input type="text" id="lname" name="lastname" placeholder="Uw achternaam..."></div>';
        $html .= '</div>'; // End wrapper for name fields

        $html .= '<div class="form-row">'; // Wrapper for "E-mail" and "Bedrijf"
        $html .= '<div><label for="email">E-mail</label>';
        $html .= '<input type="text" id="email" name="email" placeholder="Uw e-mailadres..."></div>';
        $html .= '<div><label for="company">Bedrijf</label>';
        $html .= '<input type="text" id="company" name="company" placeholder="Uw bedrijfsnaam..."></div>';
        $html .= '</div>'; // End wrapper for email and company fields

        $html .= '<label for="subject">Vraag</label>';
        $html .= '<textarea id="subject" name="subject" placeholder="Wat is uw vraag?..." style="height:200px"></textarea>';
        $html .= '<input type="submit" value="Verstuur">';
        $html .= '</form>';

        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="rightcolumn">';
        $html .= '<div class="card">';
        $html .= '<p>U kunt mij ook een mailtje sturen op dit adres</p>';
        $html .= '<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';
        $html .= '<button data-text="thijs0302@gmail.com" class="emailbutton">Kopieer mijn e-mailadres</button>';
        $html .= '<p id="succesmessage">E-mailadres is succesvol gekopieerd</p>';
        $html .= '</div>';
        $html .= '</section>';
        $html .= '  </div>';




        echo $html;
    }

    public function card($pic, $titel)
    {

        switch ($titel) {
            case 'Mijn Portfolio Website':
                $tit = "Mijn Portfolio Website";
                $cont = '
                        <div class="nestedcard2">
                        Mijn portfolio website heeft een eigen GitHub-repository.<br>
                        Dit is voor documentatie, maar ook voor het opslaan in de cloud van al mijn werk.<br><br>
                        Ik besloot mijn portfolio te gaan maken in mijn laatste jaar op mijn opleiding.<br>
                        Dit kwam door het feit dat ik een stage nodig had voor mijn examen.<br><br>
                        Tijdens het maken van de website vond ik het heel leuk om mijn kennis van de afgelopen schooljaren eindelijk te kunnen gebruiken.<br>
                        De kennis is bijvoorbeeld: HTML, PHP, CSS, JavaScript en SQL.<br><br>
                        Allemaal simpele onderwerpen die ik op school heb geleerd.<br>
                        Maar toch heb ik ook andere uitdagingen ondervonden, bijvoorbeeld het ontwikkelen van een mailingssysteem in mijn contactformulier.<br><br>
                        Zoiets heb ik nog nooit eerder op school geleerd en maakt dit project dus iets waar ik trots op ben.<br><br>
                        </div>
                        ';
                return $this->cardtje($pic, $tit, $cont);
                break;
            case 'Examen jaar op school':
                $tit = "Examen jaar op school";
                $cont = "
                <div class='carddivver'>
                        <div class='nestedcard2'>
                          <h4>MVC</h4>
                          <p>
                            Op school had ik een project gekregen genaamd 'MVC'.<br><br>
                            MVC staat voor Model, View, Controller, wat een bepaalde structuur is voor je code om te volgen.<br><br>
                            Model doet het denkwerk, view het mooie uiterlijk en de interacties, en de controller stuurt alle signalen naar de goede bestanden.<br>
                            Zo heb je een goede, stevige structuur voor je code om mee te werken.<br><br>
                            Dit idee van een MVC is wat mij heeft geïnspireerd om er zelf een website mee te maken, en zo is mijn portfolio tot stand gekomen.<br><br>
                            </p>
                        </div>
                        <div class='nestedcard2'>
                          <h4>React-Native MVC</h4>
                          <p>
                            Na dat MVC duidelijk was, kregen wij de opdracht om dit ook voor mobiel te maken.<br><br>
                            Het is exact hetzelfde principe als normale MVC, wat natuurlijk ook het idee is van MVC.<br><br>
                            Maar nu was de twist om dit in een totaal nieuwe taal te maken: 'React Native'.<br><br>
                            React Native is een programmeertaal gemaakt om te lijken op HTML, maar perfect te werken voor een mobiel apparaat.<br><br>
                            </p>
                        </div>
                        </div>
                        ";
                return $this->cardtje($pic, $tit, $cont);
                break;
            case 'Stenniz workshop stage':
                $tit = "Stenniz workshop stage";
                $cont = "
                        <div class='nestedcard2'>
                            Tijdens mijn stage bij Stenniz Workshops heb ik een GitHub-repository gekregen om aan te werken.<br><br>
                            De repository was dus al vol aan code gemaakt door andere stagiaires en was dus ook even lastig om te begrijpen.<br><br>
                            Maar nadat ik en mijn nieuwe collega's op ons gemak waren in deze repo, hebben we het gebruikt als elke andere repo.<br><br>
                            Het was zeer interessant en leerzaam om te zien hoe andere mensen hun repo's bijhouden.<br><br>
                            En zo hebben wij uitgebreid en opgeruimd.<br><br>
                            ";
                return $this->cardtje($pic, $tit, $cont);
                break;
            case 'Mijn VMBO stages':

                $tit = "VMBO stages";
                $cont = "
                <div class='carddivver'>
                        <div class='nestedcard'>
                          <h4>Doppio Espresso</h4>
                          <h6 class='date'>september 2019 tot januari 2020 - januari 2020 tot juni 2020</h6>
                          <p>
                            Voor mijn eerste stage op het VMBO ben ik gegaan voor horeca.<br><br>
                            Aangezien ik toen en nu nog steeds heel gelukkig word van horeca en tussen de mensen staan, hebben we dat als eerste getackeld.<br><br>
                            Wel wist ik dat ik passie en talent had voor ICT, maar goed, laten we eerst kijken hoe horeca bevalt.<br><br>
                            Zo heb ik bij Doppio Espresso de perfecte kennismaking met horeca gehad en kreeg ik alle basisonderdelen die je kunt vinden bij de horeca.<br>
                            Zoals bijvoorbeeld het kassawerk, beleefd met klanten omgaan en hygiënisch werken.<br><br>
                            Ik had het hier naar mijn zin, en na afloop is er mij een werkplek aangeboden.<br><br>
                            </p>
                        </div>

                        <div class='nestedcard'>
                          <h4>Movactor/Buurtplein Doorslag</h4>
                          <h6 class='date'>september 2020 tot december 2020</h6>
                          <p>
                            Nadat ik horeca heb gehad, ben ik naar de ICT gegaan.<br>
                            De stage bij Movactor was een aangename stage waar ik met plezier naar terugkijk.<br>
                            Er waren nog steeds horeca-werkzaamheden die ik ben tegengekomen, aangezien ik stage liep bij Buurtplein Doorslag.<br><br>
                            Hoe het dus zit, is dat Buurtpleinen een bedrijf is dat buurtpleinlocaties maakt in Nieuwegein.<br>
                            Dit doen ze in samenwerking met het bedrijf Movactor; Movactor regelt het hoofdkantoor en de administratie, terwijl Buurtpleinen de gebouwen regelt.<br><br>
                            Zo werkte ik dus voor Movactor en was ik tijdelijk werkzaam als een soort assistent voor het hoofd van Buurtplein Doorslag in Nieuwegein.<br>
                            Dan deed ik dus administratief werk in Excel en maakte ik aanpassingen op de site en op de sociale media.<br><br>
                            Dit deed ik tegelijkertijd met een speciaal uurtje dat het Buurtplein organiseerde, waarin het de bedoeling was dat ik computerassistentie gaf aan mensen die het nodig hadden.<br>
                            Zo zag ik dus uiteraard dezelfde paar oudere mensen voorbijkomen die hulp nodig hadden met hun printer of Facebook.<br><br>
                            Ik vond dit dus een gezellige en leerzame stage.<br><br>
                            </p>
                        </div>

                        <div class='nestedcard'>
                          <h4>Kruidvat</h4>
                          <h6 class='date'>januari 2021 tot febrauri 2021</h6>
                          <p>
                            Voor mijn laatste VMBO-stage had ik best wat moeite met het vinden van een stage.<br><br>
                            Uiteindelijk heb ik via mijn moeder een plekje kunnen krijgen bij de Kruidvat in Vleuterweide.<br><br>
                            Hier heb ik vooral vakkenvulwerk kunnen doen.<br><br>
                            De stage was niet van lange duur door de tweede golf van de coronapandemie.<br><br>
                            Toen heb ik de keuze gekregen om te stoppen met stage, en de Kruidvat zag ik niet als een denderend leerzame stage.<br><br>
                            </p>
                        </div>
                        </div>
                        ";

                return $this->cardtje($pic, $tit, $cont);

                break;
            case 'Mijn MBO stages':


                $tit = "MBO stages";
                $cont = "
                <div class='carddivver'>
                        <div class='nestedcard'>
                          <h4>Stenniz Workshops</h4>
                          <h6 class='date'>29 augustus 2022 tot 3 februari 2023</h6>
                          <p>
                            De stage bij Stenniz Workshops is de eerste MBO-stage die ik heb gedaan.<br><br>
                            Deze vond plaats in het begin van mijn 2e jaar op het ROC Midden Nederland tijdens mijn opleiding Software Development.<br>
                            Na veel contact zoeken bij vele bedrijven met weinig antwoord heb ik via mijn docent contact gekregen bij Stenniz Workshops.<br><br>
                            Hier was het de bedoeling dat ik met 2 klasgenoten aan zijn website zou gaan werken. Dit was een interessante stage,<br>
                            waar ik met veel andere stagiaires samenwerkte via Discord en op de donderdag bij hem in het appartement.<br><br>
                            Wij stagiaires waren opgedeeld in teams; ik zat met mijn 2 klasgenoten en een andere stagiair van het MBO Utrecht in het 'Webteam'.<br><br>
                            Zo kregen wij dus verschillende opdrachten voor zijn meerdere websites.<br>
                            De stage was vooral gezellig, al was het wel een vreemde omgeving om in te werken.<br><br>
                            Wel was het ontzettend leuk en leerzaam om, na een jaar in theorie te hebben gewerkt, eindelijk in de praktijk iets te kunnen maken.<br><br>
                            Veel van de opdrachten waren heel simpel; die hebben we op school geleerd, sommige waren dan weer nieuw.<br>
                            Waar ik nu nog steeds gebruik van maak, is FileZilla, dat is daar een van.<br><br>
                            Een vreemde maar gezellige en vooral leerzame stage.<br><br>
                            </p>
                        </div>

                        <div class='nestedcard'>
                          <h4>Relevant Online</h4>
                          <h6 class='date'>5 februari 2024 tot 14 juni 2024</h6>
                          <p>
                            Relevant was mijn 2e en laatste stage op het MBO.<br><br>
                            Nu ik in mijn 3e jaar zat, had ik een examenstage nodig; een stage die aan school kon bewijzen dat ik goed had geleerd en het verdien om te slagen.<br><br>
                            Relevant Online was een zeer geschikte stageplek met enorm veel discipline.<br>
                            Hier heb ik 4 dagen in de week op kantoor gezeten in Utrecht, van 8:45 tot 17:30 elke dag.<br>
                            Dit was bijzonder heftig voor mij, aangezien ik nog nooit bij zoiets serieus had gewerkt.<br><br>
                            Ik werkte op kantoor samen met allemaal collega's uit verschillende landen, waaronder Rusland, Spanje en Ierland.<br>
                            Eindelijk een keer werken met volwassen, ervaren mensen zorgde echt voor een frisse en aanmoedigende omgeving.<br><br>
                            Soms was dit ook wel lastig omdat ik eigenlijk alleen werkte aan de website; mijn collega's werkten met externe klanten, wat het voor mij af en toe wel moeilijk maakte.<br><br>
                            Maar om het op te sommen: ik heb enorm veel WordPress geleerd en sprak dagelijks alleen maar Engels met al mijn verschillende collega's.<br>
                            In een uitdagende en echt kantooromgeving.<br><br>
                            En heb dus daardoor mijn opleiding Software Development succesvol afgerond.<br><br>
                            </p>
                        </div>
                        </div>
                        ";


                return $this->cardtje($pic, $tit, $cont);

                break;
        }
    }

    public function cardtje($pic, $tit, $cont)
    {
        $html = '<div class="card">';
        $html .= '<div class="container">';
        if ($pic == !false) {
            $html .= '<img src="img_avatar.png" alt="Avatar" style="width:100%">';
        }
        $html .= '<button class="collapsible">' . $tit . '</button>';
        $html .= '<div class="contentcollapse"><p>' . $cont . '</p></div>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }


    // public function mijnschool()
    // {
    // }

    // public function overmij()
    // {
    // }


    // public function contact()
    // {
    // }


    public function admin()
    {
        include "admin.php";
    }


    public function adminread($id)
    {
        $res = $this->Functions->read($id);
        $html = '';
        $html .= '<div class="row">';
        $html .= '  <div class="homecard">';
        $html .= '    <button onclick="window.location.href=\'index.php?op=admin&case=true\'">Go Back</button>';
        $html .= $this->Functions->adminreadfunction($res, 1);
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        echo $html;
    }
}
