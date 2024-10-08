<?php

namespace App\Components\Input;

use App\Components\Input\Input;
use App\Enumerators\BaseInputProperties;
use App\Enumerators\InputType;

use Exception;

class TextInput implements Input
{
    /**
     * The id of this Input to be rendered inside the DOM
     *
     * @var string
     */
    protected string $id;

    /**
     * The label to be shown inside the DOM for this Input
     *
     * @var string
     */
    protected string $label;

    /**
     * The initial value of the Text Input
     *
     * @var string
     */
    protected string $initVal;

    /**
     * The Placeholder for the Input on the DOM
     *
     * @var string
     */
    protected string $placeholder;

    /**
     * The Type of the Input on the DOM
     *
     * @var string
     */
    protected string $type;

    /**
     * The invalid Text Input Types that this Input should not allow
     *
     * @var string[]
     */
    protected array $invalidTypes = array(
        InputType::BUTTON->value,
        InputType::CHECKBOX->value,
        InputType::FILE->value,
        InputType::SUBMIT->value
    );

    /**
     * An associative array of custom properties added to the input
     *
     * @var array<string,string>
     */
    protected array $customProperties = [];

    /**
     * Generates a Text Input for the DOM
     *
     * @param string $id The ID of the Input on the DOM. A string 'text-input-' will aways preced
     * the string informed
     * @param string $label The label showed to the User on the DOM
     * @param string $placeholder The Placeholder showed when no data is present on the Input.
     * An empty string is used as default
     * @param string $type The Input Type as a string based on the `App\Enumerators\InputType`
     * enumerator class. Type `InputType::TEXT` is the default value and cannot be the button
     * types (`InputType::BUTTON`, `InputType::CHECKBOX`, `InputType::FILE`, `InputType::SUBMIT`)
     * @param string $initialValue The initial value of the Text Input.
     * An empty string is used as default
     */
    public function __construct(
        string $id,
        string $label,
        string $placeholder = '',
        string $type = InputType::TEXT->value,
        string $initialValue = ''
    ) {
        // Check if the informed type exists
        $typeInformed = InputType::tryFrom($type);

        // Checks if it does not returned a InputType or returned an unsuported one
        if (
            $typeInformed === null ||
            in_array($typeInformed->value, $this->invalidTypes)
        ) {
            throw new Exception("Wrong Text Input Type. Type informed '$type'");
        }

        // Save the data on the properties
        $this->id = 'text-input-' . $id;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->type = $type;
        $this->initVal = $initialValue;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Returns the Label for the Input on the DOM
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Returns the Initial value for the Input on the DOM
     *
     * @return string
     */
    public function getInitialValue(): string
    {
        return $this->initVal;
    }

    /**
     * Returns the Placeholder of the Input on the DOM
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    public function addProperty(string $propertyName, string $propertyValue): void
    {
        // Check if the property is one of the default ones that should not be overriten
        if (BaseInputProperties::tryFrom($propertyName) !== null) {
            throw new Exception("The property '$propertyName' should not be overriten/used");
        }

        // Check if the propertiy already exists
        if (key_exists($propertyName, $this->customProperties)) {
            throw new Exception("The property '$propertyName' already exists");
        }

        // Add the property on the array
        $this->customProperties[$propertyName] = $propertyValue;
    }

    public function render(): string
    {
        // Declares the custom properties string
        $customProperties = '';

        // Goes throw each custom property added
        foreach ($this->customProperties as $propertyName => $propertyValue) {
            // Add the property to the string
            $customProperties .= " $propertyName=\"$propertyValue\"";
        }

        return "<input " .
                BaseInputProperties::ID->value . "='$this->id' " .
                BaseInputProperties::TYPE->value . "='$this->type' " .
                BaseInputProperties::VALUE->value . "='$this->initVal' " .
                BaseInputProperties::PLACEHOLDER->value . "='$this->placeholder'$customProperties />";
    }
}
