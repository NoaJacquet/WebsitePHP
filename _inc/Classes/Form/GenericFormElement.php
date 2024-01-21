<?php
declare(strict_types=1);

namespace Classes\Form;

use Classes\Form\InputRenderInterface;

abstract class GenericFormElement implements InputRenderInterface{

    protected string $uuid;     
    protected string $type;     
    protected string $label;       
    protected array $choices;

    public function __construct(string $label, string $uuid, array $choices)
    {
        $this->choices = $choices;
        $this->uuid = $uuid;
        $this->label = $label;
    }    
}