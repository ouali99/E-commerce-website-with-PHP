<?php
session_start();
define("URI", "http://localhost/dashboard/projet/koli-project/");
define("ROOT", str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require_once ROOT . "autoload.php";
$params = explode("/", $_GET['p']); //    auths/register/
if ($params[0] != "") {

    $nomController = ucfirst($params[0]);//    $params[0] = Auths $params[1] =register
    if (file_exists(ROOT . "controllers/" . $nomController . ".php")) { // film/controllers/Auths.php
        $controller = new $nomController(); //  $oAuths = new Auths();
        $action = $params[1];
        if (method_exists($controller, $action)) {
            // controller
            array_shift($params);
            // action
            array_shift($params);
            // last params
            call_user_func_array([$controller, $action], $params);

        } else {
            echo "Fichier rechercher introuvable";

        }
    } else {
        echo "Controller don't exist";
    }

} else {
    echo "Add param controller";
}
// korerjg testojlkjlksdclkslskdvj ajouter produit
