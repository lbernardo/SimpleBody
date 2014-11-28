<?php
    /*
     * Inicialização de classes
     */
     function __autoload($class_name) {
         // Verifica 
         if(dirname(__FILE__)."/lib/".$class_name.".php"){
             include_once dirname(__FILE__)."/lib/".$class_name.".php";
         }elseif(dirname(__FILE__)."/app/".$class_name.".php"){
             include_once dirname(__FILE__)."/app/".$class_name.".php";
         }
         
     }
     include 'SimpleBody.php';
