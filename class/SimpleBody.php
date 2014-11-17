<?php
/**
 * SimpleBody Classe de desenvolvimento MVC
 *
 * @author lucas
 */
class SimpleBody {
 
    var $PATH;
    var $PATH_TEMPLATES;
    var $PATH_COMPILE;
    var $PATH_LIB;
    var $DOM;
    var $TEMPLATE;
    
    
    public function __construct() {
        $this->PATH = dirname(__FILE__);
        $this->PATH_TEMPLATES = $this->PATH."/templates";
        $this->PATH_COMPILE = $this->PATH."/templates_c";
        $this->PATH_LIB = $this->PATH_LIB."/lib";
    }
    
    
    /**
     * Inicia template
     * @param string path 
     */
    public function template($template = null){
        $path = $this->PATH_TEMPLATES."/".$template;
        $this->TEMPLATE = $this->PATH_COMPILE."/".$template;
        // Verifica se arquivo existe
        if(file_exists($path)){
            $this->DOM = new DOMDocument();
            $this->DOM->loadHTMLFile($path);
        }else{// Arquivo de fonte não existe
            print "#Arquivo $path não existe no sistema!";
            exit;
        }
    }
    
    /**
     * getElement()
     * @param string id Id do campo 
     * @return Widget
     */
    public function getElement($id = null){
        // Pega elemento
        $ele = $this->DOM->getElementById($id);
        
        switch ($ele->tagName){
            case 'input':
                return new SimpleInput($ele,$this->DOM);
            break;
            case 'form':
                return new SimpleForm($ele,$this->DOM);
            break;
            case 'a':
                return new SimpleLink($ele,$this->DOM);
            break;
            case 'select':
                return new SimpleSelectBox($ele,$this->DOM);
            break;
        }
    }
    
    /**
     * Insere novo elemento no Corpo
     * @param Widget $elemento Elemento para inserir no corpo
     */
    public function addElement(Widget $element){
        $this->DOM->appendChild($element->toElement());
    }
    
   /**
    * Compila codigo 
    */
    public function init(){
        $this->DOM->saveHTMLFile($this->TEMPLATE);
        include $this->TEMPLATE;
    }
    
    /**
     * Retorna String HTML
     * @return string Retornca codigo HTML da página
     */
    public function toString(){
        return $this->DOM->saveHTML();
    }
    
}
?>