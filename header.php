<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="media/styledark.css">
  <link rel="stylesheet" href="media/starbackground.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="icon" href="media\fotos\favicon.ico" type="image/x-ico" />
  <title>Thijs Rietveld</title>
</head>

<body>
<div class="bg-animation">
        <div id="stars"></div>
    </div>

  <div class="header">
    <h1>Mijn Portfolio Website</h1>
    <p>Van Thijs Rietveld</p>
    <div id="fabars">
    <a class="fa fa-bars" onclick="myFunction()"></a>
    </div>
  </a>
  </div>

  <div class="mobilenav">
  <div id="myLinks">
  <a href="index.php?">Home</a>

    <a href="index.php?op=mijnwerk">Mijn werk</a>
    <a class="fa fa-caret-down" onclick="myFunction2()"></a>
  <a href="index.php?op=mijnschool">Mijn School</a>
  <a href="index.php?op=overmij">Over Mij</a>
  <a href="index.php?op=contact">Contact</a>
  <div id="myLinks2">
      <a href="index.php?op=mijnwerk&#githubcard">Github Projecten</a>
      <a href="index.php?op=mijnwerk&#stagecard">Stage</a>
      <a href="index.php?op=mijnwerk&#werkcard">Werk</a>
    </div>
  </div>

</div>

  <div class="topnav">
    <a href="index.php?">Home</a>
    <div class="dropdown">
      <button onclick="window.location.href='index.php?op=mijnwerk'" class="dropbtn">Mijn werk
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="index.php?op=mijnwerk&#githubcard">Github Projecten</a>
        <a href="index.php?op=mijnwerk&#stagecard">Stage</a>
        <a href="index.php?op=mijnwerk&#werkcard">Werk</a>
      </div>
    </div>
    <a href="index.php?op=mijnschool">Mijn School</a>
    <a href="index.php?op=overmij">Over Mij</a>
    <a href="index.php?op=contact">Contact</a>
  </div>