
<?php


if (isset($_COOKIE['adminlogin'])) {
$html = '';
$html .= '<section id="admin">';
    $html .= '<div class="row">';
        $html .= ' <div class="tablereadcard">';
            $html .= ' <h2>welkom admin</h2>';
            $res = $this->Functions->readall();
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