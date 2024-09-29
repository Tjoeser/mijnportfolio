
<?php

$content = isset($_POST['content']) ? $_POST['content'] : "contact";
$contactbutton = '<button type="submit" name="content" value="trip">' . $content . '</button>';
$tripbutton = '<button type="submit" name="content" value="trip">' . $content . '</button>';

if (isset($_COOKIE['adminlogin'])) {
$html = '';
$html .= '<section id="admin">';
    $html .= '<div class="row">';
        $html .= ' <div class="tablereadcard">';
            $html .= ' <h2>welkom admin</h2>';
            if ($content == "contact"){
                $html .= '<form method="POST" id="contentForm">';
                $html .= '<button type="submit" name="content" value="trip">trip</button>';
                $html .= '</form>';
                $res = $this->Functions->readall();
            }elseif ($content == "trip"){
                $html .= '<form method="POST" id="contentForm">';
                $html .= '<button type="submit" name="content" value="contact">contact</button>';
                $html .= '   ';
                $html .= '<button type="submit" name="content" value="add">Add trip</button>';
                $html .= '</form>';
                $res = $this->Functions->readallTrips();
            }elseif ($content == "add"){
                $html .= '<form method="POST" id="contentForm">';
                $html .= '<button type="submit" name="content" value="contact">contact</button>';
                $html .= '   ';
                $html .= '<button type="submit" name="content" value="trip">trip</button>';
                $html .= '</form>';
                $res = '';
            }
            $html .= $this->Functions->adminreadfunction($res, 0);
            $html .= ' </div>';
        $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    echo $html;
    } else {
    $html = '';
    $html .= '<div class="row">';
        $html .= ' <div class="homecard">';
            $html .= ' <h2>Login</h2>';
            $html .= ' <form action="index.php?op=loginprocess" method="post">';
                $html .= ' <label for="username">Gebruikersnaam</label>';
                $html .= ' <input type="text" id="username" name="username" placeholder="Uw Gebruikersnaam...">';
                $html .= ' <label for="password">Wachtwoord</label>';
                $html .= ' <input type="password" id="password" name="password" placeholder="Uw wachtwoord...">';
                $html .= ' <input type="submit" value="Verstuur">';
                $html .= ' </form>';
            $html .= ' </div>';
        $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</section>';
echo $html;
}

?>