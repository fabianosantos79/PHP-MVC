<?php

    namespace App\core;

    class Model{

        private static $instance;

        public static function getConn(){
            if(!isset($instance)){
                self::$instance = new \PDO('mysql:host=localhost;dbname=mvc_node','root', '');
            }

            return self::$instance;
        }
    }

?>