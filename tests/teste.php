<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $DOM = new DOMDocument();
 $DOM->loadHTMLFile("class/templates/teste.html");
 $j = $DOM->getElementById("d");
 $elemento = $DOM->createElement("option"," Ola mundo");
 $elemento->setAttribute("selected", "OO");
 $DOM->appendChild($elemento);
 
 echo $DOM->saveHTML();
