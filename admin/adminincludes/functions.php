<?php


   function __autoload($class){

     
     $class = strtolower($class);

     $the_path = "adminincludes/{$class}.php";
    
     if(file_exists($the_path)){

         
     	require_once ($the_path);
     }else{

     	die("Could not include {$class}.php class!!");
     }


   }

   function redirect($location){

        header("Location: {$location}");

   }





?>