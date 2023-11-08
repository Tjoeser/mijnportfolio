<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="media/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Thijs Rietveld</title>
</head>
<body>


<div class="header">
  <h1>Mijn Portfolio Website</h1>
  <p>Van Thijs Rietveld</p>
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
    </div>
  </div> 
  <a href="index.php?op=mijnschool">Mijn School</a> 
  <a href="index.php?op=overmij">Over Mij</a>
  <a href="index.php?op=contact">Contact</a>
  <a href="index.php?op=admin" style="float: right;">Admin</a>
</div>
