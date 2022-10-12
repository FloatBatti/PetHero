<?php

    namespace Config;

    class Autoload {

        public static function Start() {
            spl_autoload_register(function($className)
            {
                $classPath = ucwords(str_replace("\\", "/", dirname(__DIR__). "/" . $className).".php");

                include_once($classPath);
            });
        }
    }
?>