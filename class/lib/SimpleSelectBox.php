<?php
/**
 * SimpleSelect
 *
 * @author lucas
 */
class SimpleSelectBox extends Widget {

    const TAG_NAME = 'select';
    
    public function SimpleSelectBox($element) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
    }
    
    
    /**
     * Cria Widget::SimpleSelectBox do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleSelectBox Widget::SimpleSelectBox do elemento
     */
    public static function CreateElement($id = null,$Body = null){  
        $elemento = $Body->DOM->createElement(SimpleSelectBox::TAG_NAME);
        $elemento->setAttribute("id",$id);      
        return new SimpleSelectBox($elemento,$Body->DOM);
    }
    
    /**
     * Retorna Opção seleciona do selectBox
     * @return array array['text'] = Texto da opção array['value'] = Valor da opção enviado pelo formulario
     */
    public function getSelected(){
        // Consulta todos os options
        $options = $this->DOM_ELEMENT->getElementsByTagName("option");
        if($options){
            
            // Define um valor padrão
            $selected = array("value"=>$options->item("0")->getAttribute('value'),"text"=>$options->item("0")->nodeValue);
            // Lê cada option 
            for($i=0;$i<$options->length;$i++){
                $option = $options->item($i);
                if($option->hasAttribute("selected")){
                    $selected = array("value"=>$option->getAttribute('value'),'text'=>$option->nodeValue);
                    break;
                }
            }
            return $selected;
        }else{
            return $selected = array("value"=>null,"text"=>null);
        }
    }
    
    /**
     * Seleciona um campo no selecteBox
     * @param string $value Valor do opção do selectBox
     */
    public function setSelected($value = null){
        // Consulta todos os options
        $options = $this->DOM_ELEMENT->getElementsByTagName("option");
        if($options){            
            // Lê cada option 
            for($i=0;$i<$options->length;$i++){
                $option = $options->item($i);
                if($option->getAttribute('value')==$value){
                    $option->setAttribute('selected','selected');
                    break;
                }
            }
        }
    }
    
    /**
     * Retorna um array contendo as opções como Elementos
     * @return Array Array contendo Widget dos elementos
     */
    public function getOptions(){
        $options_return = array();
        $options = $this->DOM_ELEMENT->getElementsByTagName("option");
        if($options){
            for($i=0;$i<$options->length;$i++){
                $option = new Widget($options->item($i));
                array_push($options_return,$option);
            }
        }
        return $options_return;
    }
    /**
     * Adiciona opções no elemento
     * @param Array array(array("text"=>"Texto da opção","value"=>"Valor da opção","selected"=>true|false),array(...),array(...)) Que contem os paramentos 
     * array("text"=>"Texto da opção","value"=>"Valor da opção","selected"=>true|false);
     * O 'Selected' por padrão vem como false
     */
    public function setOptions($array = array(array("text"=>null,"value"=>null,"selected"=>false))){
        foreach($array as $option){
            $this->setOption($option);
        }
    }
    
    /**
     * Seta nova opção no selectBox
     * @param Array $array array("text"=>"Texto da opção","value"=>"Valor da opção","selected"=>true|false)
     */
    public function setOption($array = array("text"=>"Texto da opção","value"=>"Valor da opção","selected"=>true)){
        $option = $array;
        
        $criar_elemento = $this->DOM->createElement("option");
            
        $elemento = new Widget($criar_elemento);
        $elemento->setAttr('value',$option['value']);
        if(isset($option['selected']) && $option['selected']==true){
            $elemento->setAttr('selected','selected');
        }
        $elemento->setHTML($option['text']);

        $this->addElement($elemento);
    }
    
    /**
     * Retorna a quantidade de options que existem no selectBox
     * @return int Quantidade de Opções do SelectBox
     */
    public function getLength(){
        $option = $this->DOM_ELEMENT->getElementsByTagName("option");
        return $option->length;
    }
    
    
    
    
    
    
}
