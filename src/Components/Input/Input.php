<?php

namespace App\Components\Input;

/**
 * The base Input layout form a Input DOM element
 *
 * @property string $id The id of this Input to be rendered inside the DOM
 */
interface Input
{
    /**
     * Returns the Input ID on the DOM
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Generates the HTML for the current Input to be rendered on the DOM
     *
     * @return string
     */
    public function render(): string;
}
