<?php
/**
 * SimpleImage
 * para criação de Imagens
 * @author lucas
 */
class SimpleImage extends Widget{
    
    public function SimpleForm($element,$DOM) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $DOM;
    }
    
    /**
     * Retorna URL da imagem
     * @return string Url da Imagem
     */
    public function getSrc(){
        return $this->getAttr('src');
    }
    
    /**
     * Seta nova URL para imagem
     * @param string $url Caminho da imagem
     */
    public function setSrc($url = null){
        $this->setAttr('src',$url);
    }
    
    /**
     * Retorna Alternativa da imagem
     * @return string Alternativa da imagem (Texto que aparece quando imagem não é exibida)
     */
    public function getAlt(){
        return $this->getAttr('alt');
    }
    
    /**
     * Seta nova Alternativa da imagem (attr alt)
     * @param string $alt Alternativa da imagem (Texto que aparece quando imagem não é exibida)
     */
    public function setAlt($alt = null){
        $this->setAttr('alt',$alt);
    }
    
    /**
     * Retorna dimensão
     * @return Array array(width=>"Largura da imagem",heigth=>"Altura da imagem")
     */
    public function getDimension(){
        $width = $this->getAttr('width');
        $height = $this->getAttr('height');
        return array("width"=>$width,"height"=>$height);
    }
    
    /**
     * Seta nova dimensão
     * @param int $width Largura da imagem
     * @param int $height Altura da imagem
     */
    public function setDimension($width = 100,$height = 100){
        $this->setAttr('width',$width);
        $this->setAttr('height',$height);
    }
    
}
