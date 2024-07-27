<?php

namespace App\Components\DOM;

class Element {
    protected string $html;

    protected string $css;

    protected string $javascript;

    public function getHTML(): string
    {
        return $this->html;
    }

    public function getCss(): string
    {
        return $this->css;
    }

    public function getScript(): string
    {
        return $this->javascript;
    }
}