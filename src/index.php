<?php
require_once "vendor/autoload.php";




ob_start();//Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
if(isset($_GET['page'])) {
    $page = $_GET['page'] ;
} else {
    $page = 'accueil';
}
switch($page) :
    case 'accueil' :
        // On ajoute une variable pour le tite de la page accueil
        $title = "Site perso :: Accueil" ;
        include 'pages/accueil.php' ;
        break;
    case 'test' :
        // On ajoute une variable pour le tite de la page test
        $title = "Site perso :: Page de test" ;
        include 'pages/test.php' ;
        break;

    default :
        // On ajoute une variable pour le tite de la page par defaut
        $title = "Site perso :: Accueil" ;
        include 'pages/accueil.php' ;
        break;
endswitch ;
$contenu = ob_get_clean() ;//Lit le contenu courant du tampon de sortie puis l'efface
include 'template/template.php' ;