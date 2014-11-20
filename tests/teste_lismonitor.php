<?php



include 'class/init.php';

$body = new SimpleBody();
$body->template("lismonitor.html");
// Recebe conteudo da div
$DIV_CONTENT = $body->getElement("content");

//exit;
// Cria elemento de texto
$tInput = SimpleInput::CreateElement("novo_elemento",$body);
$tInput->setName("nome");
// Adiciona Elemento na div
$DIV_CONTENT->addElement($tInput);
    
    


echo $body->toString();