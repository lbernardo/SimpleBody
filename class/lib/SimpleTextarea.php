<?php

/**
 * SimpleTextarea
 *
 * @author lucas
 */
class SimpleTextarea extends Widget {

    const TAG_NAME = 'textarea';

    public function SimpleTextarea($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }

    /**
     * Cria Widget::SimpleTextarea do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleTextarea Widget::SimpleTextarea do elemento
     */
    public static function CreateElement($id = null, $Body = null) {
        $elemento = $Body->DOM->createElement(SimpleTextarea::TAG_NAME);
        $elemento->setAttribute('id', $id);
        return new SimpleTextarea($elemento, $Body->DOM);
    }
    
    
    /**
     * Retorna texto do textarea
     * @return string Texto do textarea
     */
    public function getText(){
        return $this->getHTML();
    }
    
    /**
     * Seta novo texto
     * @param String $text Novo texto para o textarea     * 
     */
    public function setText($text = null){
        $this->setHTML($text);
    }

}
