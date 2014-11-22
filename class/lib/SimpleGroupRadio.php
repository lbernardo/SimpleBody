<?php

/**
 * SimpleGroupRadio
 *
 * @author lucas
 */
class SimpleGroupRadio extends Widget {

    var $name_radios = null;
    
    
    public function SimpleGroupRadio($element,$name_radios) {
        $this->DOM_ELEMENT = $element;
        $this->DOM = $element->ownerDocument;
        $this->name_radios = $name_radios;
        
    }

    /**
     * Cria Widget::SimpleGroupRadio do elementot a partir da classe
     * @param string $id Id do novo elemento
     * @param string $name_radios no dos radios buttons
     * @return Widget::SimpleGroupRadio Widget::SimpleGroupRadio do elemento
     */
    public static function CreateGroup($id = null, $name_radios, $Body = null) {       
        // Cria elemento DIV que contem o grupo
        $elemento = $Body->DOM->createElement('div');
        $elemento->setAttribute('id', $id);        
        return new SimpleGroupRadio($elemento,$name_radios);
    }
    
    
    /**
     * Seta novo opção radio
     * @param string $text  Valor do texto de Identificação
     * @param string $value Valor do radio
     * @param boolean $checked Se o campo é selecionado
     * @return Widget Elemento do radio
     */
    public function setOption($text = 'Radio',$value = null,$checked = false){
        // Span
        $span = new Widget($this->DOM->createElement('span',$text));        
        // Label identificador
        $label = $this->DOM->createElement('label');
        $label = new Widget($label);
        // Cria elemento de Radio
        $input = $this->DOM->createElement('input');
        // Cria Widget do elemento
        $input = new Widget($input);
        // Seta novo tipo radio
        $input->setAttr('type',SimpleInput::RADIO);
        // Seta nome
        $input->setAttr('name',$this->name_radios);
        // Se o checked é verdadeiro 
        if($checked==true) $input->setAttr('checked','checked');
        // Adiciona elemento dentro do label
        $label->addElement($input);
        $label->addElement($span);
        // Insere label no grupo
        $this->addElement($label);
        // Retorna elemento input (Widget)
        return $input;           
    }

}
