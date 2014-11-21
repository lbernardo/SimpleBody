<?php
/**
 *  SimpleForm
 * Widget para Formularios
 * @author lucas
 */
class SimpleForm extends Widget{
    
    const TAG_NAME = 'form';
    
    const GET = 'get';
    const POST = 'post';
    
    const URL = 'application/x-www-form-urlencoded';
    const UPLOAD = 'multipart/form-data';
    const PLAIN = 'text/plain';
    
    const BLANK = '_blank';
    const SELF = '_self';
    const PARENT = '_parent';
    const TOP = '_top';
    
    public function SimpleForm($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }
    
    /**
     * Cria Widget::SimpleForm do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleForm Widget::SimpleForm do elemento
     */
    public static function CreateElement($id = null,$Body = null){
        $elemento = $Body->DOM->createElement(SimpleForm::TAG_NAME);
        $elemento->setAttribute('id',$id);
        return new SimpleForm($elemento,$Body->DOM);
    }
    
    /**
     * Retorna Ação do formulário
     * @return string Retorna o caminho da ação do formulario
     */
    public function getAction(){
        return $this->getAttr('action');
    }
    
    /**
     * Seta novo action
     * @param string $action Caminho da ação
     */
    public function setAction($action = null){
        $this->setAttr('action',$action);
    }
    
    /**
     * Retorna o metodo usado no formulario
     * @return string SimpleForm::POST SimpleForm::GET
     */
    public function getMethod(){
        return $this->getAttr('method');
    }
    
    /**
     * Seta novo metodo para formulario
     * @param string $method SimpleForm::POST || SimpleForm::GET
     */
    public function setMethod($method = SimpleForm::GET){
        $this->setAttr('method',$method);
    }
    
    
    /**
     * Retorna Tipo do Formulario
     * @return string  SimpleForm::URL(default) || SimpleForm::UPLOAD || SimpleForm::PLAIN 
     */
     public function getType(){
        return  $this->getAttr('enctype');
     }
     
     /**
      * Seta novo tipo de tratamento para formulario
      * @param string $type SimpleForm::URL(default) || SimpleForm::UPLOAD || SimpleForm::PLAIN 
      */
     public function setType($type = SimpleForm::URL){
         $this->getAttr('enctype',$type);
     }
     
     /**
      * Retorna target
      * @return string SimpleForm::BLANK || SimpleForm::SELF || SimpleForm::PARENT || SimpleForm::TOP
      */
     public function getTarget(){
         return $this->getAttr('target');
     }
     
     /**
      * Seta novo target
      * @param string $target SimpleForm::BLANK || SimpleForm::SELF || SimpleForm::PARENT || SimpleForm::TOP(default)
      */
     public function setTarget($target = SimpleForm::TOP){
         $this->setAttr('target',$target);
     }
     
     /**
     * Retorna nome do formulario
     * @return string Retorna nome do campo
     */
    public function getName(){
        return $this->getAttr('name');
    }
    
    /**
     * Seta novo nome para o formulario
     * @param string $name Nome do campo
     */
    public function setName($name){
        $this->setAttr('name',$name);
    }
    
  
    
    
}
