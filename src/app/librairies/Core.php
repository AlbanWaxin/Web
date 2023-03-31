<?php


class Core
{
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {

        $url = $this->getUrl();

        if (file_exists(APP_ROOT . "/controllers/" . ucwords($url[0]) . ".php")) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);

            require_once(APP_ROOT . "/controllers/" . $this->currentController . ".php");
            $this->currentController = new $this->currentController;

            if(!isset($url[1]) && method_exists($this->currentController, "index")){
                $this->currentMethod = "index";
            } elseif (isset($url[1]) && method_exists($this->currentController, $url[1])) {

                $this->currentMethod = $url[1];
                unset($url[1]);

                } else {

                    $this-> currentController = "Pages";
                    require_once(APP_ROOT . "/controllers/" . $this->currentController . ".php");
                    $this->currentController = new $this->currentController;

                    $this->currentMethod = "error_404";

                }

        } else {
            require_once(APP_ROOT . "/controllers/" . $this->currentController . ".php");
            $this->currentController = new $this->currentController;

            if (method_exists($this->currentController, $url[0])) {
                $this->currentMethod = $url[0];
                unset($url[0]);

            }elseif($url != NULL) {
                $this->currentMethod = "error_404";
            }


        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}
