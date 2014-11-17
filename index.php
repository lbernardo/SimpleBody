<?php

    include 'class/init.php';
    
    $body = new SimpleBody();
    $body->template("teste.html");
    $select = $body->getElement("select");
    $select->setOptions(array(array("text"=>"Ola","value"=>"OOOOO")));
    
    $elemento = SimpleSelectBox::CreateElement("novo_elemento",$body);
    $elemento->setOption(array("text"=>"Novo Elemento","value"=>"value","selected"=>true));
    $body->addElement($elemento);
    
    print $body->toString();
    
  
              
              
              
?>