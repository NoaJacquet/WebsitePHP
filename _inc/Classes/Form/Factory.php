<?php
declare(strict_types=1);

namespace Classes\Form;
final class Factory{

    public static function create($type, $label, $uuid, $choices){
        $className = "Classes\Form\Type\\".ucfirst($type);
        return new $className($label, $uuid, $choices);
    }
}