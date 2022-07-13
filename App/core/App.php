<?php

namespace App\Core;

    class App{
        
        protected $controller = 'home';
        protected $method = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->parseUrl();

            if(file_exists('../App/controllers/'.$url[1].'.php')){
                $this->controller = $url[1];
                unset($url[1]);
            }
           
            

            require_once '../App/controllers/'.$this->controller.'.php';

            $this->controller = new $this->controller();

            if(isset($url[2])){
                if(method_exists($this->controller, $url[2])){
                    $this->method = $url[2];
                    unset($url[2]);
                    unset($url[0]);
                }
            }

            $this->params = $url ? array_values($url):[];

            call_user_func_array([$this->controller, $this->method], $this->params);
        }



        public function parseUrl(){
            return explode('/', $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
        }



        public function currentUrl(){
            $url = $this->parseUrl();

            if($url[1] == "" && !isset($url[2])){
                $url[1] = 'home';
                $url[2] = 'index';
            }
            return URL_BASE."/".$url[1]."/".$url[2]."/";
        }
    }

?>