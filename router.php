<?php
$routes = require basePath('routes.php');
//check to see if the uri is in the route array , then require that 

   if(array_key_exists($uri, $routes)) {
      require basePath($routes[$uri]);
   } else {
    http_response_code(404);
      require basePath($routes['404']);
   }