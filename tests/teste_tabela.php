<?php
    include 'class/init.php';
    
    $body = new SimpleBody();
    $body->template("teste.html");
    
    $input = SimpleInput::CreateElement("my_input", $body);
    $input->setName("nome");
    
    $tabela = $body->getElement("tabela");
    
    $row = $tabela->createRow();
    
    $tabela->createCol($row,"Ola");
    $tabela->createCol($row,$input);

    print $body->toString();