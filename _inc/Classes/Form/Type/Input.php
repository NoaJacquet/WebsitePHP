<?php
declare(strict_types=1);

namespace Classes\Form\Type;
use Classes\Form\GenericFormElement;

abstract class Input extends GenericFormElement{

    public function render() : string{
        $res = '<legend>'.$this->label."</legend>".PHP_EOL;
        foreach ($this->choices as $choice){
            $res.='<input type='.$this->type.' id='.$this->uuid.' name='.$this->uuid.' required value = '.$choice.'/>'.PHP_EOL;
            $res.='<label for='.$choice.">".$choice."</label>";
        }
        return $res;
    }
}
