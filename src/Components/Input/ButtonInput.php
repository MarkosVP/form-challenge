<?php

namespace App\Components\Input;

use App\Components\Input\Input;
use App\Enumerators\InputType;

class ButtonInput implements Input
{
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function render(): string
    {
        $type = InputType::BUTTON->value;

        return "<input id='$this->id' type='$type' />";
    }
}