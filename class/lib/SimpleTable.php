<?php
/**
 * SimpleTable
 * @author lucas
 */
class SimpleTable extends Widget{
    
    const TAG_NAME = 'table';
    
    public function SimpleTable($elemento,$DOM){
        $this->DOM_ELEMENT = $elemento;
        $this->DOM = $DOM;
    }
    
    
    /**
     * Cria Widget::SimpleTable do elemento a partir da classe
     * @param string $id Id do novo elemento
     * @return Widget::SimpleTable Widget::SimpleTable do elemento
     */
    public static function CreateElement($id = null,$Body = null){
        $elemento = $Body->DOM->createElement(SimpleTable::TAG_NAME);
        $elemento->setAttribute('id',$id);
        return new SimpleTable($elemento,$Body->DOM);
    }
    
    /**
     * Cria Linha para Tabela
     * @return Widget Retorno Elemento da linha
     */
    public function createRow(){
        $row = $this->DOM->createElement("tr");
        // Cria elemento
        $row = new Widget($row);
        // Adiciona a linha na tabela
        $this->addElement($row);
        return $row;
    }
    
    
    /**
     * Cria coluna para linha
     * @param Widget $row  Liha especifica
     * @param Widget|String $strWidget String ou Elemento para inserir como coluna da linha especifica
     * @return Widget Elemento da coluna
     */
    public function createCol($row = null,$strWidget = null){
        // Cria coluna
        $elemento = $this->DOM->createElement("td");
        // Cria Widget da coluna
        $elemento = new Widget($elemento);
        // Verifica se esta mandando uma string ou um Elemento
        if(gettype($strWidget)=='object'){
            $elemento->addElement($strWidget);
        }else{
            $elemento->DOM_ELEMENT->nodeValue = $strWidget;
        }
        // Adiciona elemento
        $row->addElement($elemento);
        // Retorna Widget
        return $elemento;
    }
    
    
}
