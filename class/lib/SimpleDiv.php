<?php

/**
 * SimpleDiv
 *
 * @author lucas
 */
class SimpleDiv extends Widget {

    const TAG_NAME = 'div';
    
    public function SimpleDiv($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }
        
    /**
     * Cria Widget::SimpleDiv do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleDiv Widget::SimpleDiv do elemento
     */
    public static function CreateElement($id = null,$Body = null){
        $elemento = $Body->DOM->createElement(SimpleDiv::TAG_NAME);
        $elemento->setAttribute('id',$id);
        return new SimpleDiv($elemento);
    }

}
