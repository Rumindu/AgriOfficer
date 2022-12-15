<?php
class Core
{
    //format of the URL "controller/method/param1/param2.....>"
    protected $currentController = 'Users'; //default controller
    protected $currentMethod = 'login'; //default method
    protected $param = [];

    public function __construct()
    {
        //print_r($this->getURL());
        $url = $this->getURL();
        
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php'));{ //checking controller part of URL is exists
           
            $this->currentController = ucwords($url[0]);

            unset($url[0]);
            //call the controller
            //echo $this->currentController;
            require_once '../app/controllers/' . $this->currentController . '.php';

            //Insatiate the controller
            $this->currentController = new $this->currentController;

            //   check whether the method exists in the controller or not
            if (isset($url[1])) {
                if (method_exists($this->currentController, $url[1])) {
                    $this->currentMethod = $url[1];
        
                            unset($url[1]);
                }
                //     }

                //get URL's parameters
                    $this->params = $url ? array_values($url) :[];

               //call method and pass the parameter list
                call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

            }
        }
    }

    public function getURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL); //removing unnecessary symbols from url
            $url = explode('/', $url);

            return $url;
        }

    }
}
