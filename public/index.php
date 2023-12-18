<?php 
   require '../helpers.php';

   $routes = [
      '/' => 'controllers/home.php',
      '/listings' => 'controllers/listings/index.php',
      '/listings/create' => 'controllers/listings/create.php',
      '404' => 'controllers/error/404.php'
   ];


   //get the current uri
   $uri = $_SERVER['REQUEST_URI'];

   //check to see if the uri is in the route array , then require that 

   if(array_key_exists($uri, $routes)) {
      require basePath($routes[$uri]);
   } else {
      require basePath($routes['404']);
   }
?>