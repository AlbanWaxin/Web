<?php

require_once(APPROOT . "/librairies/Controller.php");

class Pages extends Controller
{
    public function index()
    {
        $this -> render("index");
    }

    public function about()
    {
        $this -> render("about");
    }

    public function error_404()
    {
        $this -> render("error_404");
    }
}