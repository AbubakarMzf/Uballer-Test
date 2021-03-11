<?php

//Pour récupérer la fonction e() et donc éviter les failles xss.
require_once "Utils/functions.php";
//Pour récupérer le modèle.
require_once "Models/Model.php";
require_once "Controllers/Controller.php";

//Liste des contrôleurs
$controllers = ["login"];
//Nom du contrôleur par défaut
$controller_default = "login";


//On teste si le paramètre controller existe et correspond à un contrôleur de la liste $controllers. 
//si le contrôleur n'existe pas, on utilise le contrôleur par défaut.
if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
    $nom_controller = $_GET['controller'];
} 
else {
    $nom_controller = $controller_default;
}

//On détermine le nom de la classe du contrôleur
$nom_classe = 'Controller_' . $nom_controller;

//On détermine le nom du fichier contenant la définition du contrôleur
$nom_fichier = 'Controllers/' . $nom_classe . '.php';

//Si le fichier existe
if (file_exists($nom_fichier)) {
    //On l'inclut et on instancie un objet de cette classe
    include_once $nom_fichier;
    new $nom_classe();
} 
else {
    die("Error 404: not found!");
}
