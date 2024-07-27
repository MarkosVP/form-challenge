<?php

namespace App\Components\Form;

use App\Components\Input\Input;
use Exception;

class Form {
    /** @var Input[] The list of Inputs inside this Form */
    protected array $inputs;

    /**
     * The ID of the form in the DOM
     *
     * @var string
     */
    protected string $id;

    /**
     * Creates a new Form
     *
     * @param string $id The ID of the form on the DOM. Always preceded by the string 'form-'
     */
    public function __construct(string $id) {
        // Save the data on the properties
        $this->id = 'form-' . $id;
    }

    /**
     * Inserts an `App\Components\Input` into the form
     *
     * @param Input $input
     * @return void
     */
    public function addInput(Input $input) {
        // Check if the Input already exists based on the ID
        foreach ($this->inputs as $currInput) {
            // Compare the ID
            if ($currInput->getId() === $input->getId()) {
                $idName = $input->getId();

                throw new Exception("An Input with ID $idName already exist on the  form");
            }
        }

        // Add the Input into the form
        $this->inputs[] = $input;
    }

    /**
     * Generates a HTML and CSS for the current form and its respective Inputs
     *
     * @return void
     */
    public function render()
    {

    }
}
