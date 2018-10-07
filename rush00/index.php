<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
        <link rel="stylesheet" href="css/index.css" />
		<title>Welcome to the Jungle</title>
		<style>
           
        </style>
	</head>
	<header id="header_block">
                     <!-- MENU -->
        <div class="menu">
          <nav class="menu">
            <ul class="menu">
              <li class="menu">
                <a href="index.php">Accueil</a>    
                <a href="category.php?cat=animalerie">Animal</a>
                <a href="category.php?cat=cages">Cages</a>
                <a href="category.php?cat=accessoires">Accessoires</a>
              </li>
            </ul>
          </nav>
            <a href="panier.php"><img id="cart" src="resources/main/shopping_cart.png" alt="Panier" title="Panier"></a>
            <a href="user/logout.php"><img id="close" src="resources/main/deconnect.png" alt="Déconnecter" title="Déconnecter"></a>

                                <!-- FIN DU MENU -->
        </div>
  </header>
    </br>
	<body>
        <div id="main">
                 <!-- TITRE -->
            <h1>Bienvenue dans la Jungle</h1>
            <p> Vous trouverez tout pour vos animaux de compagnie</p>
    		<div id="central_block">
                <img id="main_photo" src="resources/main/main.jpeg" alt="jardin" title="jardin par botanica">
    		</div>
            </br>
            <div id="right_block">
                <div id="login-box">
                    <p>MON LOGIN</p>
                    <?php if (isset($_SESSION['user']['log']) && $_SESSION['user']['log'] == 2) :?>
                        <h3>Vous etes connecte</h3>
                    <?php elseif (isset($_SESSION['user']['log']) &&  $_SESSION['user']['log'] == 1) :?>
                        <h3>Vous etes deconnecte</h3>
                        <?php session_destroy() ;?>
                      <?php endif ; ?>    
                    <?php if(!isset($_SESSION['user']['name'])) : ?>
                      <form method="POST" action="user/create.php">
                          Identifiant: <input type="text" name="login" />
                          <br />
                          Mot de passe: <input type="password" name="passwd" />
                          <br />
                          <input type="submit" name="connexion" value="connexion">
                          <input type="submit" name="creation" value="creer un compte">
                      </form>
                    <?php else : ?>
                    <h1>Bonjour <?= $_SESSION['user']['name'] ;?></h1>
                      <form method="POST" action="user/modif.html">
                          <input type="submit" name="profil" value="profil">
                      </form>
                      <?php if ($_SESSION['user']['droits'] == 2) :?>
                      <form method="POST" action="user/admin.php">
                          <input type="submit" name="admin" value="admin">
                      </form>
                      <?php endif ;?>
                    <?php endif ; ?>
                </div>
            </div>
        </div>
	</body>
</html>
