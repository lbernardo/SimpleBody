<?php
/**
 * Classe de Input (text,password,file,checkbox)
 *
 * @author lucas
 */
class SimpleInput extends Widget{
    
    const TAG_NAME = 'input';
    
    const TEXT = 'text';
    const PASS = 'password';
    const CHECK = 'checkbox';
    const FILE = 'file';
    
    public function SimpleInput($element,$DOM) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $DOM;
    }
    
    /**
     * Cria Widget::SimpleInput do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleInput Widget::SimpleInput do elemento
     */
    public static function CreateElement($id = null,$Body = null){
        $elemento = $Body->DOM->createElement(SimpleInput::TAG_NAME);
        $elemento->setAttribute('id',$id);
        return new SimpleInput($elemento,$Body->DOM);
    }
    
    /**
     * Retorna valor do Input
     * @return string Retorna valor do Input
     */
    public function getValue(){ 
        return $this->getAttr('value');
    }
    
    /**
     * Seta novo valor do Input
     * @param string $value Valor do input
     */
    public function setValue($value = null){
        $this->setAttr('value',$value);
    }
    
    /**
     * Retorna tipo do input
     * @return string Retorna valores 'text','password','checkbox','file'
     */
    public function getType(){
        return $this->getAttr('type');
    }
    
    /**
     * Seta novot tipo para input
     * @param string $type (SimpleInput::TEXT,SimpleInput::PASS,SimpleInput::CHECK,SimpleInput::File)
     */
    public function setType($type = SimpleInput::TEXT){
        $this->setAttr('type',$type);
    }
    
    /**
     * Retorna placeholder do input
     * @return string Retorna placeholder
     */
    public function getPlaceholder(){
        return $this->getAttr('placeholder');
    }
    
    /**
     * Seta novot tipo para input
     * @param string $value Texto do placeholder
     */
    public function setPlaceholder($value = null){
        $this->setAttr('placeholder',$value);
    }
    
    /**
     * Retorna nome do campo
     * @return string Retorna nome do campo
     */
    public function getName(){
        return $this->getAttr('name');
    }
    
    /**
     * Seta novo nome para o campo
     * @param string $name Nome do campo
     */
    public function setName($name){
        $this->setAttr('name',$name);
    }
    
    
}
