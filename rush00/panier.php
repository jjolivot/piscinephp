<?php
session_start();
$prix_total = 0;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
        <link rel="stylesheet" href="css/panier.css" />
        <link rel="stylesheet" href="css/menu.css" />
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
                <a class="animalerie" href="category.php?cat=animalerie">Animal</a>
                <a href="category.php?cat=alimentation">Alimentation</a>
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

<body>
        <div id="main">
            <div id="central_block">
                  <h1>Panier</h1>
                  <table id="panier" >
                    <tr>
                        <th class="Produit"> <span class="masse">Produit</span></br></th>
                        <th class="Description"><span class="masse">Description</span></br></th>
                        <th class="Quantite"><span class="masse">Quantité</span></br></th>
                        <th class="Prix"><span class="masse">Prix</span></br></th>
                    </tr>
                    <?php if ($_SESSION['user']['panier']) :?>
                        <?php foreach($_SESSION['user']['panier'] as $k):?>
                          <?php foreach ($k as $produit => $prix) :?>
                          <?= $v ;?>
                          <tr>
                              <td class="sous_produit"><span><?php echo $produit;?></span></br></td>
                              <td class="sous_description"><span><?php echo $description;?></span></br></td>
                              <td class="sous_quantite"><span><?php echo $quantite;?></span></br>
                                  <form id="form" method="post" action="panier.php">
                                      <input id="form_width" type="text" name="qty" />
                                        <button id="qty" >ok</button>
                                  </form>
                              </td>
                              <td class="sous_prix">
                                  <span><?php echo $prix; $prix_total += $prix;?></span></br>
                              </td>
                          </tr>
                          <?php endforeach;?>
                        <?php endforeach ;?>
                        <td>total:</td>
                        <td></td>
                        <td></td>
                        <td><?= $prix_total;?></td>
                    <?php endif ;?>
                  </table>


            <form method="POST" action="validate_panier.php">
              <input type="submit" name="submit" value="Valider le Panier"/>
            </form>

            </div>

            <div id="right_block">
                <div id="login-box">
                    <h2>Mon Compte</h2>
                </div>
            </div>


        </div>
  </body>
  <footer>    
        <p>
            &copy cbenetea 2018
            <a href="mentions_legales.php" alt="Mentions légales" title="Mentions légales">Mentions légales</a>
        </p>
  </footer>
</html>