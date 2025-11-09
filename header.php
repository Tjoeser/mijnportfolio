<!DOCTYPE html>
<html lang="nl">

<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PD23GGWX');
  </script>
  <!-- End Google Tag Manager -->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Mijn naam is Thijs Rietveld, 19 jaar oud. Deze portfolio website heb ik gebouwd tijdens mijn opleiding en hou ik netjes bij. Ik hoop dat u het bevalt.">
  <meta name="author" content="Thijs Rietveld">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="media/styledark.css" media="(min-width: 769px)">
  <link rel="stylesheet" href="media/mobilestyle.css" media="(max-width: 768px)">
  <link id="background" rel="stylesheet" href="media/starbackground.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" href="https://thijsrietveld.com/media/fotos/TR_LOGO.ico?v=2" type="image/x-icon" />
  <link rel="icon" type="image/png" href="https://thijsrietveld.com/media/fotos/TR_LOGO.png" sizes="32x32" />

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

  <title>Thijs Rietveld | Web Developer Portfolio</title>
</head>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HMYHRQBSLZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-HMYHRQBSLZ');
</script>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PD23GGWX"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="bg-animation">
    <div id="stars"></div>
  </div>

  <div class="header">
    <h1>Thijs Rietveld | Software Developer</h1>
  </div>
  <div class="mobilenav">
    <div id="mobilelinks">
      <!-- <a href="index.php?#home">Home</a> -->
      <a href="index.php?#overmij">Over mij</a>
      <a href="index.php?#mijnwerk">Mijn werk </a>
      <a href="index.php?#mijnschool">Mijn school</a>
      <a href="index.php?#contact">Contact</a>
    </div>

  </div>


  <nav class="topnav">
    <ul>
      <li class="navlink">
        <a href="#overmij" class="nav-link" data-target="overmij">Over mij</a>
      </li>
      <li class="navlink" id="mijnwerkbutton">
        <a href="#mijnwerk" class="nav-link" data-target="mijnwerk">Mijn werk</a>
        <ul class="dropdown-content">
          <li><a href="#projectencard" class="nav-link" data-target="projectencard">Projecten</a></li>
          <li><a href="#githubcard" class="nav-link" data-target="githubcard">Github Projecten</a></li>
          <li><a href="#stagecard" class="nav-link" data-target="stagecard">Stage</a></li>
          <li><a href="#werkcard" class="nav-link" data-target="werkcard">Werk</a></li>
        </ul>
      </li>
      <li class="navlink">
        <a href="#mijnschool" class="nav-link" data-target="mijnschool">Mijn school</a>
      </li>
      <li class="navlink">
        <a href="#contact" class="nav-link" data-target="contact">Contact</a>
      </li>
    </ul>
  </nav>