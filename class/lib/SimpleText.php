<?php

/**
 * SimpleText
 *
 * @author lucas
 */
class SimpleText extends Widget {

    // Tag name
    var $TAG_NAME = 'p';
    
    const TAG_PARAG = 'p';
    const TAG_BOLD = 'b';
    const TAG_STRONG = 'strong';
    const TAG_SUPER = 'sup';
    const TAG_EMPHA = 'em';
    const TAG_SUB = 'sub';
    const TAG_SPAN = 'span';
    const TAG_H1 = 'h1';
    const TAG_H2 = 'h2';
    const TAG_H3 = 'h3';
    const TAG_H4 = 'h4';
    const TAG_H5 = 'h5';
    const TAG_H6 = 'h6';
    const TAG_LEGEND = 'legend';

    public function SimpleText($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }

    /**
     * Cria Widget::SimpleText do elemento a partir da classe
     * @param string $text Texto do elemento
     * @param string $tag Simpletext::tag_... Tipo de tag
     * @param SimpleBody $Body
     * @return Widget::SimpleText Widget::SimpleText do elemento
     */
    public static function CreateElement($text = null, $tag, $Body) {
        $elemento = $Body->DOM->createElement($tag,$text);        
        return new SimpleText($elemento);
    }
    
    /**
     * Retorna texto
     * @return string Texto
     */
    public function getText(){
       return $this->getHTML();
    }
    /**
     * Seta novo texto no documento
     * @param string $str Texto
     */
    public function setText($str = null){
        $this->setHTML($str);
    }
}
