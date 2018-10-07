<?php
if (file_exists("htdoc/private/archives"))
{
    if (!file_exists('htdoc'))
        mkdir('htdoc/private/', 0755, true);
    if (!file_exists('htdoc/private'))
        mkdir('htdoc/private',0755);
    if (!file_exists('htdoc/private/archives'))
        file_put_contents('htdoc/private/archives', null);
    $list = unserialize(file_get_contents('htdoc/private/archives'));
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
        <link rel="stylesheet" href="css/admin.css" />
        <link rel="stylesheet" href="css/menu.css" />
		<title>botanica</title>
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

                  <h1>Panier valider</h1>
                  <table id="panier" >
                    <tr>
                      <th class="Produit"> <span class="masse">client</span></br></th>
                        <th class="Produit"> <span class="masse">Produit</span></br></th>
                        <th class="Quantite"><span class="masse">Prix</span></br></th>
                    </tr>
                    <?php if (isset($list)) :?>
                      <?php foreach($list as $v) :?>
                          <tr>
                                <td class="sous_produit"><span><?= $v['client'] ;?></span></br></td>            
                                  <td class="sous_produit"><span><?= $v['produit'] ;?></span></br></td>
                                  <td class="sous_quantite"><span><?= $v['prix'] ;?></span></td>
                          </tr>
                      <?php endforeach ;?>
                    <?php endif ;?>
                  </table>
            </div>


        </div>
  </body>
  <footer>
  </footer>
</html>