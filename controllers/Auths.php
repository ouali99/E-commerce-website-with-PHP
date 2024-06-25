<?php

class Auths extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function login()
    {
        $this->render("login");
    }

    public function register()
    {
        $this->render("register");
    }

}