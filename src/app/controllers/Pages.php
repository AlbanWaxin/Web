<?php

require_once(APP_ROOT . "/librairies/Controller.php");

class Pages extends Controller
{
    public function about()
    {
        $this->render("about");
    }

    public function index()
    {
        $this->render("index");
    }
}