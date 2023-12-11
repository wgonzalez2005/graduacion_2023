<?php
session_name("Graduacion");
session_start();
define("RUTA", $_SERVER['REQUEST_SCHEME'] . ":/" . "/" . $_SERVER['SERVER_NAME'] ."/graduacion/api/");
define("HOST", "127.0.0.1");
define("USER", "root");
define("PASSWORD", "Admin@123--");
define("DB", "db_graduacion");
define("PORT", "3306");
define("CHARSET", "utf8");
define("NAMEAPP", "Graduacion");
define("ERROR_MODELO", "EL MODELO NO EXISTE EN LA APLICACION");
define("ERROR_CONTROLADOR", "EL CONTROLADOR NO EXISTE EN LA APLICACION");
define("ERROR_MOTODOS", "EL METODO NO EXISTE EN EL CONTROLADOR");

