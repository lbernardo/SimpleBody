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
            case 'div':
                return new SimpleDiv($ele,$this->DOM);
            break;
            case 'img':
                return new SimpleImage($ele,$this->DOM);
            break;
            default :
                return new Widget($ele);
        }
    }
    
    /**
     * Insere novo elemento no Corpo
     * @param Widget $elemento Elemento para inserir no corpo
     */
    public function addElement(Widget $element){
        $body  = $this->DOM->getElementsByTagName("body");
        $body = $body->item(0);
        $body->appendChild($element->toElement());
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
    
    /**
     * Retorna titulo da pagina
     * @return string Título da Página
     */
    public function getTitle(){
        // Seleciona elemento
        $title = $this->DOM->getElementsByTagName("title");
        $title = $title->item(0);
        return $title->nodeValue;
    }
    
    /**
     * Seta novo titulo da página
     * @param string $text Título da Página
     */
    public function setTitle($text = null){
        $title = $this->DOM->getElementsByTagName("title");
        $title = $title->item(0); 
        // Verifica se já existe titulo na pagina
        if($title==NULL){ // Caso não
            // Lê cabeçalho
            $head = $this->getHead();
            // Cria titulo
            $title = $this->DOM->createElement("title");
            // Adiciona no titulo
            $head->appendChild($title);
        }
        // Seta novo titulo
        $title->nodeValue = $text;
    }
    
    /**
     * Seta novo style na página
     * @param string $src Caminho do Style
     * @param string $type Tipo de arquivo
     */
    public function setStyle($src = null,$type = 'text/css'){
        // Lê cabeçalho
        $head = $this->getHead();
        // Cria novo Style
        $style = $this->DOM->createElement("style");
        // Seta o tipo do estilo
        $style->setAttribute("type",$type);
        // Seta o caminho 
        $style->setAttribute("href",$src);
        // Adiciona estilo no cabeçalho
        $head->appendChild($style);
    }
    
    /**
     * Seta novo script na página
     * @param string $src Caminho do Script
     * @param string $type Tipo de arquivo
     */
    public function setScript($src = null,$type = 'text/javascript'){
        // Lê cabeçalho
        $head = $this->getHead();
        // Cria novo script
        $style = $this->DOM->createElement("script");
        // Seta o tipo do arquivo
        $style->setAttribute("type",$type);
        // Seta o caminho 
        $style->setAttribute("src",$src);
        // Adiciona script no cabeçalho
        $head->appendChild($style);
    }
    
    /**
     * Método interno para retorna elemento head
     * @return DOMElement Retorna head
     */
    private function getHead(){
        $head = $this->DOM->getElementsByTagName("head");
        $head = $head->item(0);
        return $head;
    }
    
}
?>