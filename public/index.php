<?php 
   require '../helpers.php';
  
   //this is odd - it just works. 
   spl_autoload_register(function ($class){
      $path = basePath('Framework/' . $class . '.php');
      if(file_exists($path)) {
         require $path;
      }
   });

   //Instatiating the router
   $router = new Router();

   //this is here, because we need to instanceiate the a new Router 1st
   //get routes
   $routes = require basePath('routes.php');

   //get the current uri and http methods
   $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
   $method = $_SERVER["REQUEST_METHOD"];

   //route the request
   $router->route($uri, $method);

?>