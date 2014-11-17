<?php

/**
 * SimpleTable
 *
 * @author lucas
 */
class SimpleTable extends Widget {

    const TAG_NAME = 'table';

    public function SimpleTable($element, $DOM) {
        $this->DOM_ELEMENT = $element;
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

}
