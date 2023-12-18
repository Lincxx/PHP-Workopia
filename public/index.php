<?php 
   require '../helpers.php';

   require basePath('Router.php');

   $router = new Router();

   
   $routes = require basePath('routes.php');

   //get the current uri
   $uri = $_SERVER['REQUEST_URI'];
   $method = $_SERVER["REQUEST_METHOD"];

   $router->route($uri, $method);

?>