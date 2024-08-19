<?php

use App\Components\Input\ButtonInput;
use App\Components\Input\TextInput;
use App\Enumerators\InputType;
use PHPUnit\Framework\TestCase;

final class InputTest extends TestCase
{
    public function testCreateValidTextInput(): void
    {
        $input = new TextInput('testInput', 'testLabel', 'testPlaceholder', InputType::TEXT->value, 'testing default value');

        $this->assertInstanceOf(TextInput::class, $input);
        $this->assertSame('text-input-testInput', $input->getId());
        $this->assertSame('testLabel', $input->getLabel());
        $this->assertSame('testPlaceholder', $input->getPlaceholder());
        $this->assertSame('testing default value', $input->getInitialValue());
    }

    public function testCreateInvalidTypeTextInput(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Wrong Text Input Type. Type informed \'checkbox\'');

        new TextInput('testInput', 'testLabel', 'testPlaceholder', InputType::CHECKBOX->value);
    }

    public function testRenderTextInput(): void
    {
        $input = new TextInput('testInput', 'testLabel', 'testPlaceholder', InputType::TEXT->value, 'testing default value');

        $this->assertInstanceOf(TextInput::class, $input);
        $this->assertSame('text-input-testInput', $input->getId());
        $this->assertSame('testLabel', $input->getLabel());
        $this->assertSame('testPlaceholder', $input->getPlaceholder());
        $this->assertSame('testing default value', $input->getInitialValue());

        $renderedInput = $input->render();

        $this->assertSame(
            "<input id='text-input-testInput' type='text' value='testing default value' placeholder='testPlaceholder' />",
            $renderedInput
        );
    }

    public function testCreateButtonInput()
    {
        $input = new ButtonInput('testButton', InputType::BUTTON->value);

        $this->assertInstanceOf(ButtonInput::class, $input);
        $this->assertSame('button-testButton', $input->getId());
    }

    public function testCreateInvalidTypeButtonInput(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Wrong Button Input Type. Type informed \'email\'');

        new ButtonInput('testButton', InputType::EMAIL->value);
    }

    public function testRenderButtonInput(): void
    {
        $input = new ButtonInput('testButton', InputType::BUTTON->value);

        $this->assertInstanceOf(ButtonInput::class, $input);
        $this->assertSame('button-testButton', $input->getId());

        $renderedInput = $input->render();

        $this->assertSame(
            "<input id='button-testButton' type='button' />",
            $renderedInput
        );
    }
}
