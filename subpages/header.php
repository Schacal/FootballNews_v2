<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $t ?> - FootBall News!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="favicon.ico"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<img id="tlo" src="resources/tlo.jpg"/>
<nav class="navbar navbar-inverse">
    <div class="container-fluid" > 
        <div   class="navbar-header" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
              </button>
            <a class="navbar-brand"  href="index.html">
                FootBall<br>
                News!
            </a>
            
 <!--<img class="logo" src="resources/logo.png" alt="site logo">-->
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class=" nav navbar-nav">
                <li class="<?= ($active == 1)?"active":""?>">
                   <a href="home.html">Home</a>
                </li>
                <li class="<?= ($active == 2)?"active":""?>">
                   <a href="Ekstraklasa.html">Ekstraklasa</a>
                </li>
                <li class="<?= ($active == 3)?"active":""?>">
                    <a href="BundesLiga.html">Bundesliga</a>
                </li>
                <li class="<?= ($active == 4)?"active":""?>">
                   <a href="LigaMistrzow.html">Liga Mistrzów</a>
                </li>
                <li class="<?= ($active == 5)?"active":""?>">
                    <a href="Wyniki.html">Wyniki</a>
                </li>
                <li class="<?= ($active == 6)?"active":""?>">
                    <a href="panel.html">Panel</a>
                </li>
            </ul>
        </div>
</div>   
</nav>
<div class="glowny ">