<?php

namespace App\Components\Form;

use App\Components\Dom\Element;
use App\Components\Input\Input;
use App\Components\Input\TextInput;
use Exception;

class Form
{
    /** @var Input[] The list of Inputs inside this Form */
    protected array $inputs = [];

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
    public function __construct(string $id)
    {
        // Save the data on the properties
        $this->id = 'form-' . $id;
    }

    /**
     * Inserts an `App\Components\Input` into the form
     *
     * @param Input $input
     * @return void
     */
    public function addInput(Input $input)
    {
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
     * @return Element
     */
    public function render(): Element
    {
        $fieldsetId = $this->id . '-fieldset';

        // Set the initial html and css
        $html = "<fieldset id='$fieldsetId'><form id='$this->id'>";
        $css = "#$fieldsetId {
            border: 1px black;
            border-style: solid;
            border-radius: 5px;

            background-color: white;

            display: flex;
            flex-direction: column;
            padding: 1rem;

            width: 30rem;

            .inputRow {
                display: flex;
                flex-direction: row;
                flex-grow: 1;

                margin-bottom: 0.2rem;

                label { width: 30%; min-width: fit-content; background-color: #B8FEB3; padding: 0.2rem; }
                input { width: 70%; min-width: fit-content; margin-left: 0.2rem; }
            }
        } ";

        // Generate a row for each Input added inside the Form
        foreach ($this->inputs as $input) {
            // Create a div for every Input
            $inputHtml = "<div class='inputRow'>";

            // Set the label initial value;
            $label = '';

            // Check if is a Text Input
            if ($input instanceof TextInput) {
                // Update the label
                $label = $input->getLabel();
            }

            // Add a Label to the Input
            $inputHtml .= "<label>$label</label>";

            // Add the actual Input
            $inputHtml .= $input->render();

            // Close the Input div
            $inputHtml .= '</div>';

            // Add the HTML to the base form
            $html .= $inputHtml;
        }

        // Close the Fieldset
        $html .= "</form></fieldset>";

        // Return the DOM Page Element
        return new Element($html, $css);
    }
}
