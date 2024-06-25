<?php
class Clients extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function blogDetails()
    {
        $this->render("blogDetails");
    }

    public function blog()
    {
        $this->render("blog");
    }

    public function contact()
    {
        $this->render("contact");
    }

}