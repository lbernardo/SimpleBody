<?php
/**
 * Widgets de elementos Widget
 *
 * @author lucas
 */
class Widget{
    
    protected $DOM_ELEMENT = null;
    protected $DOM =null;
   
    public function Widget($elemento){
        $this->DOM_ELEMENT = $elemento;
    }
    
    /**
     * Retorna o atributo
     * @param string $name Retorna o valor do atributo
     * @return string
     */
    public function getAttr($name = null){
        return $this->DOM_ELEMENT->getAttribute($name);
    }
    
    
    /**
     * Seta/Modifica atributo no elemento
     * @param string $name Nome do atributo
     * @param string $value Valor do atributo
     * 
     */
    public function setAttr($name = null, $value = null){
        if($name!=null && $value!=null)
            $this->DOM_ELEMENT->setAttribute($name,$value);
    }
    
    /**
     * Verifica se atributo existe
     * @param string $name Nome do atributo
     * @return bool Retorna TRUE || FALSE 
     */
    public function hasAttr($name = null){
        return $this->DOM_ELEMENT->hasAttribute($name);
    }
    
    /**
     * Retorna todas as classes do elemento
     * @return array Retorna valores de classe do elemento
     */
    public function getClass(){
        // Verifica se atributo de classe existe
        if($this->hasAttr('class')){
            // Retorna todas as classes
            return explode(" ",$this->getAttr('class'));
        }else{ // Não existe retorna vazio
            return array();
        }
    }
    
    /**
     * Verifica se classe existe no elemento
     * @param string $name Nome da classe que deseja procurar
     * @return bool Retorna TRUE | FALSE
     */
    public function hasClass($name = null){
        // Retorna todos as classes do elemento
        $classe = $this->getClass();
        return in_array($name,$classe);
    }
    
    /**
     * Adiciona uma nova classe
     * @param string $classe Nome da(s) classe(s) que deseja     * 
     */
    public function addClass($classe=null){
        // Verifica se existe atributo de classe
        if($this->hasAttr('class')){
            // Str de classe ja existente
            $str_classe = implode(" ",$this->getClass());
            // Insere nova classe
            $str_classe.=" $classe";
        }else{
            // Insre nova classe
            $str_classe = $classe;
        }
        
        $this->setAttr("class", $str_classe);        
        
    }
    
    /**
     * Retorna so titulo do elemento
     * @return string Titulo do elemento
     */
    public function getTitle(){
        return $this->getAttr('title');
    }
    
    /**
     * Seta novo titulo para o elemento
     * @param string $title Titulo do Elemento
     */
    public function setTitle($title = null){
        $this->setAttr('title',$title);
    }
    
    /**
     * Remove Attr
     * @param string $name Remove Atributo
     */
    public function removeAttr($name = null){
        $this->DOM_ELEMENT->removeAttribute($name);
    }
    
    
    public function toElement(){
        return $this->DOM_ELEMENT;
    }
    
    /**
     * Retorna ID
     * @return string Retorna o id do campo
     */
    public function getId(){
        return $this->getAttr('id');
    }
    
    /**
     * Seta novo id
     * @param string $id Novo ID
     */    
    public function setId($id = null){
        $this->setAttr('id',$id);
    }
    
    /**
     * Retorna HTML
     * @return string HTML do Widget
     */
    public function getHTML(){
        return $this->DOM_ELEMENT->nodeValue;
    }
    /**
     * seta HTML
     * @param string $value Insere HTML
     */
    public function setHTML($value = null){
        $this->DOM_ELEMENT->nodeValue = $value;
    }
    
}
