<?php

namespace App\Components\Input;

use App\Components\Input\Input;
use App\Enumerators\BaseInputProperties;
use App\Enumerators\InputType;
use Exception;

class ButtonInput implements Input
{
    /**
     * The id of this Input to be rendered inside the DOM
     *
     * @var string
     */
    protected string $id;

    /**
     * The button type. Can be `InputType::BUTTON` or `InputType::SUBMIT`
     *
     * @var string
     */
    protected string $type;


    /**
     * The valid Button Input Types that this Input should not allow
     *
     * @var string[]
     */
    protected array $validTypes = array(
        InputType::BUTTON->value,
        InputType::SUBMIT->value
    );

    /**
     * An associative array of custom properties added to the input
     *
     * @var array<string,string>
     */
    protected array $customProperties = [];

    /**
     * Creates a Button Input for the DOM
     *
     * @param string $id The name of the button to be created. Will have a `button-` prefix in front of the passed ID
     * @param string $type The type of the button according to the `InputType` enumerator
     */
    public function __construct($id, $type = InputType::BUTTON->value)
    {
        // Check if the informed type exists
        $typeInformed = InputType::tryFrom($type);

        // Checks if it does not returned a InputType or returned an unsuported one
        if (
            $typeInformed === null ||
            !in_array($typeInformed->value, $this->validTypes)
        ) {
            throw new Exception("Wrong Button Input Type. Type informed '$type'");
        }

        // Save the data inside the properties
        $this->id = 'button-' . $id;
        $this->type = $type;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function addProperty(string $propertyName, string $propertyValue): void
    {
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

        return "<input " . BaseInputProperties::ID->value . "='$this->id' " . BaseInputProperties::TYPE->value . "='$this->type'$customProperties />";
    }
}
