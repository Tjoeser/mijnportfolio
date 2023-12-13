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
                case 'admin':
                    $this->admin();
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
        $this->Functions->cookie("visitorcookie","visitor");
        $html = '';
        $html = '<div class="main-content">';
        $html .= '<section id="home">';
        $html .= '<div class="row">';
        $html .= '<div class="homecontainer">';
        $html .= '  <div class="homehomecard">';
        $html .= '    <h2>Welkom op mijn website</h2>';
        $html .= '    <p>Ik heet u graag welkom en kijk gerust rond naar mijn geschiedenis en prestaties</p>';
        $html .= '      <a class="downarrow" href=index.php?#mijnwerk><i class="fa fa-arrow-down"></i></a>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '</section>';


        $html .= '<section id="mijnwerk">';
        $html .= '<div class="row1">';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '  <div class="card">';
        $html .= '    <h2 class="centerh" id="githubcard">Github Projecten</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3>Mijn Portfolio Website</h3>';
        $html .= '    <p>Ik wil graag beginnen met u mijn nieuwste project te laten zien, namelijk mijn eigen portfolio website.<br>
                        Hier kunt u bekijken wat ik heb gemaakt en een kijkje nemen in de achterliggende code.<br>
                        </p>';
        $html .= '    <p>
                        Dit project is tot stand gekomen met de kennis die ik tijdens mijn lessen heb opgedaan.<br>
                        Ik heb geleerd van het doorlichten van mijn eigen code en er een eenvoudigere versie ervan gemaakt voor een simpele "low traffic" site.<br><br>
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
                        Twee klasgenoten, mede-stagiares, en ik hebben ons uiterste best gedaan om het geheel wat te verbeteren.<br>
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
        $html .= '    <h2 class="centerh" id="stagecard">Stage</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h3 class="centerh" id=doppiostage>Mijn VMBO stages</h3>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4 class="centerp">Doppio Espresso</h4>';
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
        $html .= '    <h4 class="centerp">Movactor/Buurtplein Doorslag</h4>';
        $html .= '    <h6>september 2020 tot juli 2021</h6>';
        $html .= '    <p>
                        Mijn tweede stage heeft zich volledig gericht op het gebied van ICT.<br><br>
                        In deze stage begon ik met het assisteren van mijn begeleider bij het draaiende houden van het "buurtplein".<br><br>
                        Voor de duidelijkheid, mijn baas en ik werkten voor een bedrijf genaamd Movactor, dat samenwerkte met het bedrijf Buurtpleinen om locaties te creëren en te onderhouden. <br><br>
                        Buurtpleinen was als het ware de body, terwijl Movactor de brain was.<br><br>
                        Nadat ik mijn baas een tijdje had geholpen en tegelijkertijd mijn eigen workshop genaamd "Computerhulp" had opgezet, begon ik eindelijk met mijn eigen taken.<br><br>
                        In deze workshop was mijn hoofdtaak om mensen, voornamelijk ouderen, te helpen met hun ICT-gerelateerde problemen.<br>
                        De mensen stroomde nou niet perse binnen maar het was genoeg om elke dag wat te doen.<br><br>
                        Desondanks had ik na verloop van tijd een leuk aantal terugkerende gezichten in mijn workshop. <br>
                        Dus ik kan wel zeggen dat ik veel heb geleerd over geduldig omgaan met oudere mensen en hen helpen met hun ICT-problemen.<br><br>
                        Ook hier kreeg ik een aanbod voor een terugkerende stageplek, maar helaas is dit vanwege de tweede golf van de coronapandemie niet doorgegaan.
                        </p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4 class="centerp">Kruidvat</h4>';
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
        $html .= '    <h3 class="centerh">Mijn MBO stages</h3>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4 class="centerp" id="stennizworkshops">Stenniz Workshops</h4>';
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
                        Communiceren met hem was namelijk best lastig en hij was gek genoeg heel achterdochtig.<br><br>
                        Uiteindelijk heb ik behoorlijk wat geleerd en mogen uitproberen. <br><br>
                        Dus ik ben tevreden.</p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedinnestedcard">';
        $html .= '    <h4 class="centerp">Mijn volgende stage</h4>';
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
        $html .= '    <div class="link"><a href="#doppioinfo">Klik hier om informatie te krijgen over mijn ervaring met werken bij Doppio Espresso!</a></div>';
        $html .= '    <div class="link"><a target="_blank" href="https://www.movactor.nl/">Bezoek de website van Movactor!</a></div>';
        $html .= '    <div class="link"><a target="_blank" href="https://www.stennizworkshops.nl/">Bezoek de Stenniz Workshops website!</a></div>';
        $html .= '      </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn1">';
        $html .= '          <div class="card">';
        $html .= '              <h2 class="centerh" id=werkcard>Werk</h2>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 class="centerh">Krantenwijk</h3>';
        $html .= '    <h6>agusutus 2018 tot juni 2022</h6>';
        $html .= '                  <p>
                                    Mijn eerste baan was vrij bekend.<br>
                                    De krantenwijk was een eenvoudige klus die ik elke donderdag deed.<br><br>
                                    Het was geen inspirerend werk, maar toch viel het wel mee.<br><br>
                                    Ik heb dit 3 jaar gedaan en het is tot nu toe mijn langstlopende baan.<br>
                                    </p>';
        $html .= '  </div>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 class="centerh" id=doppioinfo>Doppio Espresso</h3>';
        $html .= '    <h6>januari 2020 tot juni 2020</h6>';
        $html .= '                  <p>
        Dit was mijn eerste baan die ik beschouw als een echte baan.<br><br>
        Deze kans werd mij aangeboden na een half jaar stage te hebben gelopen, zoals ik eerder heb aangegeven.<br><br>
        Ik heb hier ongeveer een half jaartje gewerkt, totdat door corona het verstandiger leek om iets anders te gaan zoeken. <br>
        Met de staige erbij ben ik hier dus bijna een jaar werkzaam geweest.<br><br>
        Mijn taken bestonden uit tafels schoonmaken, serveren, bestellingen opnemen, en op speciale dagen mocht ik zelfs de broodjes klaarmaken.<br>
        Ook werd ik tussendoor geïntroduceerd in de wereld van het zetten van koffie en thee met een speciaal apparaat.<br><br>
        Dit was een interessante leerervaring waar ik altijd dankbaar voor zal zijn. <br>
        Maar ik heb wel ontdekt dat de horeca niet echt iets voor mij is. <br><br>
        Ook merkte ik dat de begeleiders mij nog steeds als stagiair zagen en ik dus nog steeds stagiairtaken kreeg.<br>
        Dat vond ik wel jammer.<br><br>
        Maar goed, zoals ik al zei, heb ik geen spijt van mijn tijd daar.<br>
                                    </p>';
        $html .= '  </div>';
        $html .= '              <div class="nestedcard">';
        $html .= '                  <h3 class="centerh">Pathe Utrecht Leidscherijn</h3>';
        $html .= '    <h6>5 februari 2022 tot het heden</h6>';
        $html .= "                  <p>
        Mijn tweede baan, waar ik momenteel nog werk, is bij Pathe.<br><br>
        Al sinds ik voor het eerst stages moest zoeken voor de middelbare school dacht ik aan Pathe.<br>
        Maar mijn ouders zeiden: 'Nee, zoek een stage die past bij horeca of ICT.'<br><br>
        Nou, dat is ook helemaal goed gekomen, want die heb ik namelijk ook gedaan.<br><br>
        Maar toen ik een tijdje niet meer werkzaam was, dacht ik: 'Nu wil ik wel weer iets gaan doen.'<br>
        En toen herinnerde ik me opeens waar ik al die tijd zo graag stage wilde lopen.<br><br>
        Dus ik ben meteen contact gaan zoeken en in een mum van tijd stond ik op de werkvloer.<br><br>
        Het werk bij Pathe bestaat vooral uit schoonmaken van de zalen, de vloer, de toiletten, de prullenbakken en de bar.<br><br>
        De diensten waar je voor kan worden ingeroosterd zijn: Service, F&B, Portier en Kassa. <br>
        Ook hebben we nog EVENT diensten waarin een bedrijf een zaal heeft gehuurd en wij als werknemers ervoor zorgen dat het een prettig bezoek is.<br>
        Verder betekent Service dus dat we vooral schoonmaken en de zalen in- en uitgaan en klaarzetten voor de volgende voorstelling.<br>
        F&B is waar wij de drankjes en snacks verkopen aan de bezoekers en dat betekent dus ook veel lachen en zwaaien.<br>
        En Portier en Kassa zijn meer het verkopen en scannen van kaartjes en eventuele andere vormen van klantenservice.<br><br>
        Ik heb het bij Pathe enorm naar mijn zin en heb daar mijn beste vrienden ontmoet.<br><br>
        Dus als conclusie kan ik vertellen dat ik hier heb geleerd om sociaal en open te zijn tegenover collega's en klanten.<br>
        Daarnaast dus ook andere soorten van arbeid die in de praktijk wel van pas kunnen komen.<br>
                                    </p>";
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn1">';
        $html .= '      <div class="rightcard">';
        $html .= '    <div class="link"><a href="#doppiostage">Om terug tegaan naar de informatie over mijn stage bij Doppio Espresso!</a></div>';
        $html .= '      </div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';


        $html .= '<section id="mijnschool">';
        $html .= '<div class="row">';
        $html .= '  <div class="card">';
        $html .= '    <h2 class="centerh">Mijn school</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h2 class="centerh">Basis Onderwijs</h2>';
        $html .= '<div class="row1">';
        $html .= '      <div class="column-container1">';
        $html .= '      <div class="leftcolumn2">';
        $html .= '    <h4>OBS Vleuterweide</h4>';
        $html .= '    <h6>augustus 2009 tot juni 2017</h6>';
        $html .= '    <p>
        Mijn basisschooltijd was een beetje chaotisch. <br><br>
        Aan het einde van groep 2 moest ik opeens naar een ander gebouw en werden de klassen opgesplitst.<br><br>
        Vandaar de twee fotos aan de zijkant, waarbij de bovenste bekend stond als de roze school en de onderste als de zwarte.<br>
        Heel knap hoe we die namen hebben bedacht.<br><br>
        Vervolgens heb ik dus van groep 3 tot en met groep 8 op de "zwarte" school gezeten.<br>
        In de basisschool gebeurt natuurlijk niet veel spannends dus ik heb niet per se iets interessants te vertellen, behalve dat ik hier al duidelijke tekenen liet zien van werken met ICT.<br><br>
        Zo hielp ik iedereen met hun mobiele devices en dergelijke.<br><br>
        Dus dat was al een grappige teaser naar hoe de rest van mijn carrière eruit zou zien.
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
        $html .= '    <h6>augustus 2017 tot juni 2021</h6>';
        $html .= '    <p>
        Mijn middelbare school heb ik op kader niveau gedaan, wat mij werd aangeraden aan het einde van groep 8. <br>
        We waren vanaf het begin al overtuigd dat het Wellant College in Montfoort (nu bekend als Yuverta) perfect voor mij zou zijn. <br>
        En dat klopte.<br><br>
        Ik heb 4 jaar op die school gezeten en succesvol mijn examens afgerond. <br><br>
        Het Wellant staat natuurlijk bekend als een boerenschool, dus als u hulp nodig heeft om te kijken of uw koe overgewicht heeft, ben ik de man.<br><br>
        Maar naast dat heb ik ook veel ervaring opgedaan in praktijkvakken zoals: Food, Techniek, Bloem en Design, Dier, Groen, en als laatste hadden we nog het IT lab. <br>
        Helaas heb ik hier bijna geen tijd kunnen doorbrengen maar alle andere praktijkvakken waren erg leuk en leerzaam.<br><br>
        Natuurlijk had ik ook de standaard theorievakken zoals Wiskunde, Nederlands, Engels, Rekenen, Biologie, NASK, een beetje Duits en nog Mens en Maatschappij.<br><br>
        Mijn derde en vierde jaar hier zijn een beetje overhoop gegooid door corona en dat was allemaal niet zo prettig. <br>
        Maar tijdens de lockdown kreeg ik de kans om even te pauzeren en te reflecteren op wie ik ben, wie ik wil zijn, en wat ik moet doen om daar te komen.<br><br>
        Na al dat gedoe kon ik gelukkig weer terug naar school, waar ik in één keer mijn diploma heb gehaald en meteen ben doorgegaan naar mijn MBO-opleiding Software Developer op het ROC.<br><br>
        Nu vind ik het wel jammer dat ik geen gala heb gehad maar ik hoop een herkansing te krijgen op het ROC.<br>
        </p>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn2">';
        $html .= '    <img class=fakeimg1 src="media/fotos/wellantcollege.jpg" alt="Een foto van mijn middelbare school die niet kon inladen">';
        $html .= '    <img class=fakeimg1 src="media/fotos/yuverta.jpg" alt="Nog een foto van mijn middelbare school die niet kon inladen">';
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
        $html .= '    <h6>augustus 2021 tot juni 2024</h6>';
        $html .= '    <p>
        Over het ROC gesproken, daar heb ik natuurlijk ook een verhaaltje over.<br>
        Maar dat verhaal is nog niet af, want ik ben nog steeds bezig.<br><br>
        Ik ben hier dus begonnen toen corona net weer aan het zakken was en dat was wel heel erg fijn. <br><br>
        Wat betreft schoolervaring is het ROC echt heel fijn. <br>
        Het voelde meteen alsof ik hier was om wat te gaan leren en niet zomaar stil te zitten.<br><br>
        Mijn verwachting was vooral dat ik uit mijn hoofd zou leren hoe ik moet programmeren en dat ik bij wijze van spreken nooit meer zou moeten googelen tijdens het developen. <br>
        Nu heb ik geleerd dat dat helemaal niet nodig is. <br><br>
        Ik heb juist nu geleerd hoe ik mezelf talen en trucjes moet leren in plaats van 3 jaar lang op school zitten en dan alles in mijn hoofd hebben zitten.<br><br>
        Het eerste jaar was eerst heel erg gefocust op lessen. <br>
        Deze lessen bestonden uit: Back-End, Front-End, Projecten, Projectmanagement, ICT-Skills en een beetje Python.<br><br>
        Ook hadden we nog theorie-lessen zoals Nederlands, Rekenen en Engels.<br><br>
        Dit was eigenlijk hoe jaar 1 eruitzag - heel simpel maar leerzaam en legde een sterke basis voor de aankomende jaren.<br><br><br>
        Hierna begon leerjaar 2, waar de eerste helft van het jaar bestond uit stage lopen.<br>
        Dit deed ik bij Stenniz Workshops (<a style="text-decoration:none; color:gray;" href="index.php?op=mijnwerk&#stennizworkshops">voor meer informatie daarover klik hier</a>). <br><br>
        De tweede helft van het tweede jaar was ik weer terug op school. <br>
        Alleen was nu alles anders.
        Dat ziet u ook op de 2e foto, daar is de binnenkant helemaal omgebouwd om een klantoor te simuleren.<br><br>
        Lessen waren nu bijna elke dag hetzelfde en de lessen bestonden uit werken aan een websitepakket genaamd Jarvis/Bitacademy. <br>
        Dit was een heel leerzaam pakket maar het was gewoon niet heel handig om dit op school te komen doen. <br>
        Het zou perfect zijn om vanuit huis te werken met dit pakket maar dat deden wij natuurlijk niet. <br><br>
        Deze periode van de opleiding genoot ik niet zo van, de moed zakte me hier een beetje in de schoenen.<br><br><br>
        Maar toen kwam het derde jaar, waarvan ik in de eerste helft weer lessen volg en de tweede helft weer stage moet gaan lopen. 
        Een stage plek heb ik alleen nog niet gevonden.<br><br>
        In de eerste helft van dit jaar hebben ze een beetje de problemen van vorig jaar gecorrigeerd. <br>
        We werken nu amper in Jarvis, waar ik heel blij mee ben.<br>
        We volgen nu dus gewoon weer lessen van docenten die voor in het lokaal staan. <br><br>
        Wie had gedacht dat je dat zo erg kon missen.<br><br>
        En dan komen we bij nu, het moment dat ik deze website schrijf in de hoop dat een stagebedrijf het leest en mij wil aannemen.<br><br>
        Dus...<br><br>
        Work In Progress.<br>
        </p>';
        $html .= '  </div>';
        $html .= '  <div class="rightcolumn2">';
        $html .= '    <img class=fakeimg1 src="media/fotos/ROC.jpg" alt="Een foto van mijn opleiding die niet kon inladen">';
        $html .= '    <img class=fakeimg1 src="media/fotos/roc2.jpg" alt="Een andere foto van mijn opleiding die niet kon inladen">';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</section>';


        $html .= '<section id="overmij">';
        $count = $this->Functions->currentAgeCount();
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h2 class="centerh">Over mij</h2>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h2 class="centerh">Korte introductie</h2>';
        $html .= '    <p>
        Mijn naam is Thijs Rietveld.<br>
        Ik ben ' . $count . ' jaar oud.<br><br>
        Deze portfolio website gaat dus over mij. <br>
        Maar naast mijn werk en schoolervaring heb ik natuurlijk veel meer te vertellen.<br>
        </p>';
        $html .= '  </div>';
        $html .= '  <div class="nestedcard">';
        $html .= "    <h2 class='centerh'>Hobby's</h2>";
        $html .= "    <p>
        In mijn vrije tijd vind ik het heel leuk om te werken aan mijn eigen projecten.<br><br>
        Denk bijvoorbeeld aan mijn eigen games ontwikkelen of buiten school aan school projecten werken.<br>
        Naast web of games speel ik ook hier en daar met het ontwikkelen van applicaties.<br>
        Ook kan ik deze website wel als een product van mijn hobby's zien.<br><br>
        En naast alle mooie development dingetjes geniet ik ook wel van leuke spelletjes als God of War of The Last of Us.<br><br>
        Zelf vind ik het ook heel belangrijk dat ik op de hoogte blijf van alle films en series en bezoek ik vaak mijn werk als een bezoeker in plaats van als een werknemer.<br>
        </p>";
        $html .= '  </div>';
        $html .= '  <div class="nestedcard">';
        $html .= '    <h2 class="centerh">Geschiedenis</h2>';
        $html .= '    <p>
        Als u kijkt op deze site zult u een timeline vinden van mijn school en werk ervaring tot nu.<br><br>
        Dus daar zal ik u hier niet nog eens mee lastig vallen.<br>
        Ik kan u wel vertellen over wat daar tussendoor gebeurden.<br><br>
        Sinds mijn geboorte woon ik al in hetzelfde huis in Vleuten.
        Heel dichtbij mijn basisschool en het winkelcentrum dus dat was perfect als kind.<br>
        Op een dag werd ik wat ouder en was het verstandig als ik een keer wat verder van huis ging.<br><br>
        Dus toen kwam het perfect uit dat ik naar Montfoort mocht fietsen elke dag voor mijn middelbare school.<br>
        Ook kon ik nu voor het eerst in mijn eentje op de bus wat ik echt heel leuk vond.<br><br>
        Op deze school heb ik ook voor het eerst een opdracht gekregen om een game te gaan bouwen.<br>
        Dat was ook wel heel leuk omdat ik hier toch echt wel aan software development zat te denken.<br><br>
        Nou ja toen was ik klaar met de middelbare en toen mocht ik opeens een hele andere route naar school nemen elke dag.<br>
        En dan reflecteer je toch opeens hoe makkelijk het was om te zeuren over 5 minuten lopen naar school.<br><br>
        Maar ja dat hoort er ook allemaal bij denk ik.<br><br>
        Nu zit ik dus op het ROC in Nieuwegein en ben ik nu deze portfolio website aan het maken.<br><br>
        Ik hoop dat dit een beetje gelukt is en u mij nu een beetje hebt leren kennen.<br>
        Maar als u nog vragen heeft, kunt u altijd naar de contact pagina gaan en het formulier invullen.<br>
        </p>';
        $html .= '  </div>';
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
        $html .= '    <div class="link"><a href="media\pdf\Curriculum Vitae Thijs Rietveld.pdf" download>Download mijn CV</a></div>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';


        $html .= '<section id="contact">';
        $html .= '<div class="row">';
        $html .= '<div class="leftcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <h2 class="centerh">Contact</h2>';
        $html .= '      <form action="index.php?op=contactprocess" method="post">';
        $html .= '          <label for="fname">Voornaam</label>';
        $html .= '          <input type="text" id="fname" name="fname" placeholder="Uw voornaam...">';
        $html .= "          <label for='preposition'>Tussenvoegsel's</label>";
        $html .= "          <input type='text' id='preposition' name='preposition' placeholder='Uw tussenvoegsels...'>";
        $html .= '          <label for="lname">Acternaam</label>';
        $html .= '          <input type="text" id="lname" name="lname" placeholder="Uw achternaam...">';
        $html .= '          <label for="email">E-mail</label>';
        $html .= '          <input type="text" id="email" name="email" placeholder="Uw e-mailadres...">';
        $html .= '          <label for="company">Bedrijf</label>';
        $html .= '          <input type="text" id="company" name="company" placeholder="Uw bedrijfsnaam...">';
        $html .= '          <label for="subject">Vraag</label>';
        $html .= '          <textarea id="subject" name="subject" placeholder="Wat is uw vraag?..." style="height:200px"></textarea>';
        $html .= '          <input type="submit" value="Verstuur">';
        $html .= '      </form>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '<div class="rightcolumn">';
        $html .= '  <div class="card">';
        $html .= '    <p>U kunt mij ook een mailtje sturen op dit adres</p>';
        $html .= '     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>';
        $html .= '     <button data-text="thijs0302@gmail.com" class="emailbutton">Kopieer mijn e-mailadres</button>';
        $html .= '     <p id="succesmessage">E-mailadres is succesvol gekopieerd</p>';
        $html .= '  </div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</section>';
        $html .= '</div>';
        echo $html; 
    }

    // public function mijnwerk()
    // {
    // }

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
        if (isset($_COOKIE['adminlogin'])) {
            $html = '';
            $html .= '<div class="row">';
            $html .= '  <div class="tablereadcard">';
            $html .= '    <h2>welkom admin</h2>';
            $res = $this->Functions->readall();
            $html .= $this->Functions->adminreadfunction($res, 0);
            $html .= '  </div>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
        } else {
            $html = '';
            $html .= '<div class="row">';
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
            echo $html;
        }
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
