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

    /**
     * Add a property to be rendered on the DOM
     *
     * @param string $propertyName The name of the property that will be added on the DOM. Can be an
     * `InputProperties` or any string other than `BaseInputProperties`
     * @param string $propertyValue The value for this property
     *
     * @return void
     */
    public function addProperty(string $propertyName, string $propertyValue): void;
}
