<?php
session_start();
if (isset($_POST['choice_admin']) || isset($_POST['suppression']))
{
  if (!file_exists('../htdoc'))
      mkdir('../htdoc/private/', 0755, true);
    if (!file_exists('../htdoc/private'))
      mkdir('../htdoc/private',0755);
    if (!file_exists('../htdoc/private/passwd'))
      file_put_contents('../htdoc/private/passwd', null);
    $list = unserialize(file_get_contents('../htdoc/private/passwd'));
    if ($list)
    {
      if ($_POST['choice_admin'] == 1)
          $choice = 'administrateur';
      else if ($_POST['choice_admin'] == 2)
          $choice = 'utilisateur';
      $i = 0;
      foreach ($list as $elem)
      {
        if ($elem['id'] == $_POST['id'] && !isset($_POST['suppression']))
          $elem = array('id' => $i, 'login' => $_POST['login'], 'passwd' => $elem['passwd'], 'droits' => $choice);          
        if (!isset($_POST['suppression']) || $elem['id'] != $_POST['id'])
          $list2[] = $elem;
        $i++;
      }
    }
    file_put_contents('../htdoc/private/passwd', serialize($list2));
}
$list = unserialize(file_get_contents('../htdoc/private/passwd'));
$produits=unserialize(file_get_contents("../htdoc/private/liste_produits"));
$j = 0;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
        <link rel="stylesheet" href="../css/admin.css" />
        <link rel="stylesheet" href="../css/menu.css" />
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
                <a href="../index.php">Accueil</a>    
                <a href="category.php?cat=animalerie">Animal</a>
                <a href="category.php?cat=alimentation">Alimentation</a>
                <a href="category.php?cat=cages">Cages</a>
                <a href="category.php?cat=accessoires">Accessoires</a>
              </li>
            </ul>
          </nav>
            <a href="panier.php"><img id="cart" src="../resources/main/shopping_cart.png" alt="Panier" title="Panier"></a>
            <a href="logout.php"><img id="close" src="../resources/main/deconnect.png" alt="Déconnecter" title="Déconnecter"></a>

                                <!-- FIN DU MENU -->
        </div>
  </header>

<body>
        <div id="main">
            <div id="central_block">

                  <h1>ADMINISTRATEUR</h1>
                  <table id="panier" >
                    <tr>
                        <th class="Produit"> <span class="masse">Utilisateur</span></br></th>
                        <th class="Quantite"><span class="masse">Droit</span></br></th>
                    </tr>
                    <?php foreach($list as $v) :?>

                            <tr>
                              <form id="form" method="POST" action="admin.php">
                                <input type='hidden' name='id' value="<?= $v['id'] ;?>"/>                           
                                <td class="sous_produit"><input type="text" name="login" value="<?= $v['login'] ;?>"/></br></td>
                                <td class="sous_quantite"><span>
                                  <select name='choice_admin'>
                                    <?php if ($v['droits'] == 'utilisateur') :?>
                                      <option value="1">administrateur</option> 
                                      <option value="2" selected><?= $v['droits'] ;?></option>
                                    <?php elseif ($v['droits'] == 'administrateur') :?>
                                      <option value="1" selected><?= $v['droits'] ;?></option> 
                                      <option value="2">utilisateur</option>
                                    <?php endif ;?>
                                  </select></span></br>
                                  <button id="qty" >ok</button>
                                  <input type="submit" name="suppression" value="supprimer"/>
                                  </form>
                                </td>
                            </tr>
                    <?php endforeach ;?>
                    <form method="POST" action="../modif_db.php" enctype="multipart/form-data">
                        <?php foreach ($produits as $prod) :?>
                        <?php $j++;?>
                       <h3>
                                <img src="../<?=$prod["url"];?>" alt="<?=$prod["url"];?>" height ="70" width ="70"> <?=$prod["name"];echo "\t"?> <?=$prod["prix"];?>€
                                <input type="hidden" name="id" value="<?=$prod["id"];?>"/>
                                <input type="text" name="name" value="<?=$prod["name"];?>">
                                <input type="text" name="description" value="<?=$prod["description"];?>">
                                <input type="text" name="prix" value="<?=$prod["prix"];?>">
                                <h3><?=$prod["description"];?></h3>
                        </h3><br />
                        <?php endforeach ;?>
                        <h3>
                                <span>id:</span>
                                <input type="text" name="id" value="<?=$j;?>" disabled=disabled/>
                                <span>image:</span>
                                <input type="file" name="image" value=""/>
                                <span>Nom:</span>
                                <input type="text" name="name" value="">
                                <span>description:</span>
                                <input type="text" name="description" value="">
                                <span>prix:</span>
                                <input type="text" name="prix" value="">
                                <span>categorie:</span>
                                <select name="categories">
                                  <option value="1">Animal</option>
                                  <option value="2">Cages</option>
                                  <option value="3">Accessoires</option>
                                </select>
                            </h3><br />
                        <input type="submit" name="submit" value="modifier">
                    </form>
                  </table>
                  <a href="../Panier_admin.php">Afficher Panier</a>
            </div>


        </div>
  </body>
</html>