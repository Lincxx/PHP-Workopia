<?php 
   require '../helpers.php';

   //get the current uri
   $uri = $_SERVER['REQUEST_URI'];

   require basePath('router.php');
?>