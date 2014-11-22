<?php

/**
 * SimpleGroupRadio
 *
 * @author lucas
 */
class SimpleGroupRadio extends Widget {

    public function SimpleGroupRadio($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }

    /**
     * Cria Widget::SimpleGroupRadio do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleGroupRadio Widget::SimpleGroupRadio do elemento
     */
    public static function CreateGroup($id = null, $Body = null) {
       
        // Cria elemento DIV que contem o grupo
        $elemento = $Body->DOM->createElement('div');
        $elemento->setAttribute('id', $id);
        return new SimpleGroupRadio($elemento);
    }
    
    
    /**
     * Seta novo radio
     */

}
