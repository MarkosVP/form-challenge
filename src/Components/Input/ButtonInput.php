<?php

namespace App\Components\Input;

use App\Components\Input\Input;
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

    public function __construct($id, $type = InputType::BUTTON->value)
    {
        // Check if the informed type exists
        $typeInformed = InputType::tryFrom($type);

        // Checks if it does not returned a InputType or returned an unsuported one
        if (
            $typeInformed === null ||
            !in_array($typeInformed->value, $this->validTypes)
        ) {
            throw new Exception('Wrong Button Input Type. Type informed ' . $type);
        }

        // Save the data inside the properties
        $this->id = $id;
        $this->type = $type;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function render(): string
    {
        return "<input id='$this->id' type='$this->type' />";
    }
}
