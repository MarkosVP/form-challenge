<?php

namespace App\Components\Input;

interface Input {
    /**
     * The id of this Input to be rendered inside the DOM
     *
     * @var string
     */
    protected string $id;

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
     * Generates an Input for the DOM
     */
    public function __construct();
}
