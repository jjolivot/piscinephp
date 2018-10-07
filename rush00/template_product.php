#!/usr/bin/php
<?PHP

#----------------animaux-----------------------------------#
$array[] = array(
    "id" => 0,
    "url" => "resources/animaux/lion.jpeg", 
    "name" => "Lion",
    "description" => "Lion d'afrique, Felin Indomptable",
    "prix" => 100000, "categories" => array("animalerie" => 1));
$array[] = array(
    "id" => 1,
    "url" => "resources/animaux/tigre_blanc.jpeg", 
    "name" => "Tigre blanc", 
    "description" => "Tigre Blanc, Felin Indomptable", 
    "prix" => 100000, "categories" => array("animalerie" => 1));
$array[] = array(
    "id" => 2,
    "url" => "resources/animaux/loup.jpeg", 
    "name" => "Loup", 
    "description" => "Loup, Felin Indomptable", 
    "prix" => 100000, "categories" => array("animalerie" => 1));

#----------------Cages-------------------------------------#

$array[] = array(
    "id" => 3,
    "url" => "resources/accessoires/escalier_dinterieur.jpeg", 
    "name" => "Escalier d'interieur",
    "description" => "Escalier d'interieur pour votre animal de compagnie",
    "prix" => 17, "categories" => array("accessoires" => 2));
$array[] = array(
    "id" => 4,
    "url" => "resources/accessoires/harnais.jpeg", 
    "name" => "harnais",
    "description" => "Harnais pour votre animal de compagnie",
    "prix" => 17, "categories" => array("accessoires" => 2));
$array[] = array(
    "id" => 5,
    "url" => "resources/accessoires/natura_bois_pour_cage.jpeg", 
    "name" => "Natura en bois",
    "description" => "Natura en bois pour la cage",
    "prix" => 17, "categories" => array("accessoires" => 2));

#----------------Accessoires-------------------------------#

$array[] = array(
    "id" => 6,
    "url" => "resources/cages/cage_voyage.jpeg", 
    "name" => "Cages de voyages",
    "description" => "Cages de voyage pour emporter votre animal partout!",
    "prix" => 29, "categories" => array("accessoires" => 2, "cages" => 3));


file_put_contents("htdoc/private/liste_produits", serialize($array));
?>
