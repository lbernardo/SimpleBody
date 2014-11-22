<?php
/**
 * SimpleButton
 *
 * @author lucas
 */
class SimpleButton extends Widget{
    
    const BUTTON = 'button';
    const SUBMIT = 'submit';
    const RESET = 'reset';
    
    const TAG_NAME ='button';
    
    public function SimpleButton($element){
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }
    
    /**
     * Cria Widget::SimpleButton do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleButton Widget::SimpleButton do elemento
     */
    public static function CreateElement($id = null,$Body = null){
        $elemento = $Body->DOM->createElement(SimpleButton::TAG_NAME);
        $elemento->setAttribute('id',$id);
        return new SimpleImage($elemento);
    }
    
    /**
     * Retorna tipo do Botão
     * @return string Retorna o tipo do botão (button,submit,reset)
     */
    public function getType(){
        return $this->getAttr('type');
    }
    
    /**
     * Seta novo tipo de botão
     * @param string $type Tipo de Botão (SimpleButton::BUTTON,SimpleButton::SUBMIT,SimpleButtton::RESET)
     */
    public function setType($type = SimpleButton::BUTTON){
        $this->setAttr('type',$type);
    }
    
}
