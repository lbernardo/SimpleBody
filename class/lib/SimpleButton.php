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
    
    
    public function SimpleButton($element,$DOM){
        $this->DOM_ELEMENT = $element;
        $this->DOM = $DOM;
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
