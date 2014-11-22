<?php
/**
 * SimpleLink
 * Para link (a href)
 * @author lucas
 */
class SimpleLink extends Widget{
    
    const TAG_NAME = 'a';
    
    public function SimpleLink($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }
    
    /**
     * Cria Widget::SimpleLink do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleLink Widget::SimpleLink do elemento
     */
    public static function CreateElement($id = null,$Body = null){
        $elemento = $Body->DOM->createElement(SimpleLink::TAG_NAME);
        $elemento->setAttribute('id',$id);
        return new SimpleLink($elemento);
    }

    
    /**
     * Retorna caminho do link
     * @return string Link do caminho
     */
    public function getLink(){
        return $this->getAttr('href');
    }
    /**
     * Seta novo caminho
     * @param string $href Caminho para o link
     */
    public function setLink($href = null){
        $this->setAttr('href',$href);
    }
}
