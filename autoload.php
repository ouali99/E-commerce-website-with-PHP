<?php

function autoload($classe)
{
    $chemins = [ROOT . 'app', ROOT . 'controllers', ROOT . 'models'];
    foreach ($chemins as $chemin) {
        // ./app/Controllers.php
        if (file_exists($chemin . "/" . $classe . ".php")) {
            require_once $chemin . "/" . $classe . ".php";
        }
    }

}

spl_autoload_register("autoload");