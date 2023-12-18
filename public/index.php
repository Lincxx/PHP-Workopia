<?php 
   require '../helpers.php';
   require basePath('Database.php');
   require basePath('Router.php');

   //Instatiating the router
   $router = new Router();

   //this is here, because we need to instanceiate the a new Router 1st
   //get routes
   $routes = require basePath('routes.php');

   //get the current uri and http methods
   $uri = $_SERVER['REQUEST_URI'];
   $method = $_SERVER["REQUEST_METHOD"];

   //route the request
   $router->route($uri, $method);

?>