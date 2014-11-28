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
    var $PATH_MODELS;
    
    public function __construct() {
        $this->PATH = dirname(__FILE__);
        $this->PATH_TEMPLATES = $this->PATH."/templates";
        $this->PATH_COMPILE = $this->PATH."/templates_c";
        $this->PATH_LIB = $this->PATH_LIB."/lib";
        $this->PATH_MODELS = $this->PATH."/models";
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
            // Input
            case 'input':
                return new SimpleInput($ele);
            break;
            // Formulario
            case 'form':
                return new SimpleForm($ele);
            break;
            // Link
            case 'a':
                return new SimpleLink($ele);
            break;
            // Select Box
            case 'select':
                return new SimpleSelectBox($ele);
            break;
            // DIV
            case 'div':
                return new SimpleDiv($ele);
            break;
            // Imagem    
            case 'img':
                return new SimpleImage($ele);
            break;
            // Botão
            case 'button':
                return new SimpleButton($ele);
            break;
            // Tabela
            case 'table':
                return new SimpleTable($ele);
            break;
            // Lista
            case 'ul':
            case 'ol':
                return new SimpleList($ele);
            break;
            // TextArea
            case 'textarea':
                return new SimpleTextarea($ele);
            break;
            // Texto
            case 'span':
            case 'strong':
            case 'b':
            case 'i':
            case 'em':
            case 'sup':
            case 'span':
            case 'h1':
            case 'h2':
            case 'h3':
            case 'h4':
            case 'h5':
            case 'h6':
            case 'legend':
                return new SimpleText($ele);
            break;
            // Default
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
   
    /**
     * Método para cria elemento a partir de uma tag
     * @param string $tag Tag name 
     * @return Widget de elemento por tag 
     */
    public function createElementByTag($tag = null){
        // Cria elmento
        $elemento = $this->DOM->createElement($tag);
        // Cria elemento para widget
        return new Widget($elemento);
    }
    
    /**
     * Importa modelo
     * @param string $model Nome do modelo
     * @param string $id div do modelo
     */
    public function importModel($model,$id){
        // Tmp modelo
        $tmp = new DOMDocument;
        $tmp->loadHTMLFile($this->PATH_MODELS."/".$model);
        $elemento = $tmp->getElementById($id);
        $elemento = $this->DOM->importNode($elemento,true);
        return new Widget($elemento);
    }
    
    
}
?>