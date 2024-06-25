<?php
class Paniers extends Controllers{
    public function __construct()
    {
        parent:: __construct();
    }

    public function checkout()
    {
        $this->render("checkout");
    }

    public function shopCart()
    {
        $this->render("shopCart");
    }

    

}