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
    
    
   
    /**
     * Carrega div de uma template
     * @param string $path Caminho do elemento da DIV
     * @param string $id ID da DIV que deseja encontrar
     * @return Widget::SimpleDiv retorna DIV completa do codigo
     */
    public function loadElement($path = null,$id = null){
        // Consulta o 
        $DOM = new SimpleBody($path);
        // Encontra DIV pelo ID
        $DIV = $body->getElement($id);
        // Limpa memoria
        unset($DOM);
        return $DIV;        
    }

}
