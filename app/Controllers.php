<?php


class Controllers
{

    public function __construct()
    {

    }

    public function render($fichier, $data = [], $controller = "")
    {
        if (empty($controller)) {
            $controller = strtolower(get_class($this));
        }

        extract($data);

        ob_start();
        require_once "./views/" . $controller . "/" . $fichier . ".php";
        $content = ob_get_clean();

        require_once('./views/layout/default.php');


    }

    public function estVide($datas)
    {
        foreach ($datas as $data) {
            if (empty($data)) {
                return true;
            }
        }
        return false;
    }

}