<?php
/**
 * Extensão para Bootstrap
 * @author lucas
 */
class Bootstrap {
    
    const CLASS_ROW = 'row';
    
    /**
     * Cria Div de linha com uma quantidade de colunas
     * @param int $cols Número de colunas
     * @param SimpleBody $Body 
     * @return array Array contento elementos onde 0=> Elemento Pai | 1..n => Elementos filhos
     */
    public static function createRow($cols = 4,$Body = null){
        
        $result = array();
        
        $div = SimpleDiv::CreateElement(null,$Body);
        $div->addClass(Bootstrap::CLASS_ROW);
        // Adiciona Elemento pai
        array_push($result,$div);
        $col_row = 12/$cols;
        for($i=0;$i<$cols;$i++){
            $element = SimpleDiv::CreateElement(null,$Body);
            $element->addClass("col-lg-".$col_row);
            $div->addElement($element);
            // Adiciona Elementos filhos
            array_push($result,$element);
        }
        
        return $result;
    }
    
    
}
