<?php

/**
 * SimpleList
 *
 * @author lucas
 */
class SimpleList extends Widget {

    const TAG_NAME = 'ul';

    public function SimpleList($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }

    /**
     * Cria Widget::SimpleList do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleList Widget::SimpleList do elemento
     */
    public static function CreateElement($id = null, $Body = null) {
        $elemento = $Body->DOM->createElement(SimpleList::TAG_NAME);
        $elemento->setAttribute('id', $id);
        return new SimpleList($elemento, $Body->DOM);
    }
    
    /**
     * Criar Elemento na lista
     * @param Widget|string $strWidget Elemento da lista
     * @return Widget Elemento da lista
     */
    public function setElementList($strWidget = null){
        
        // Cria novo elemento
        $li_element = $this->DOM->createElement("li",'');
        $li_element = new Widget($li_element);
        
        
        // Verifica qual o tipo do strWidget
        if(gettype($strWidget)=='object'){ // Se é um objeto widget
            $li_element->addElement($strWidget);
        }else{
            $li_element->DOM_ELEMENT->nodeValue = $strWidget;
        }
        
        // Adiciona elemento na lista
        $this->addElement($li_element);
        
    }

}
