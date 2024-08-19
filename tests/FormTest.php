<?php

use App\Components\Dom\Element;
use App\Components\Form\Form;
use App\Components\Input\ButtonInput;
use App\Components\Input\TextInput;
use PHPUnit\Framework\TestCase;

final class FormTest extends TestCase
{
    public function testCreateForm(): void
    {
        $form = new Form('testForm');

        $this->assertInstanceOf(Form::class, $form);
        $this->assertSame('form-testForm', $form->getId());

        $form->addInput(new TextInput('testInput', 'testLabel', 'testPlaceholder'));
        $form->addInput(new ButtonInput('testButton'));
    }

    public function testAddInputsOnForm(): void
    {
        $form = new Form('testForm');

        $form->addInput(new TextInput('testInput', 'testLabel', 'testPlaceholder'));
        $form->addInput(new ButtonInput('testButton'));

        $inputs = $form->getInputs();

        $this->assertIsArray($inputs);
        $this->assertInstanceOf(TextInput::class, $inputs[0]);
        $this->assertInstanceOf(ButtonInput::class, $inputs[1]);
    }

    public function testAddDuplicatedIdOnForm(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("An Input with ID 'text-input-testInput' already exist on the form");

        $form = new Form('testForm');

        $form->addInput(new TextInput('testInput', 'testLabel1'));
        $form->addInput(new TextInput('testInput', 'testLabel2'));
    }

    public function testRenderForm(): void
    {
        $form = new Form('testForm');

        $form->addInput(new TextInput('testInput', 'testLabel', 'testPlaceholder'));
        $form->addInput(new ButtonInput('testButton'));

        $formElement = $form->render();

        $this->assertInstanceOf(Element::class, $formElement);

        $renderedForm = $formElement->getHTML();

        $this->assertIsString($renderedForm);
        $this->assertNotEmpty($renderedForm);
        $this->assertSame(
            "<fieldset id='form-testForm-fieldset'><form id='form-testForm'><div class='inputRow'><label>testLabel</label><input id='text-input-testInput' type='text' value='' placeholder='testPlaceholder' /></div><div class='inputRow'><label></label><input id='button-testButton' type='button' /></div></form></fieldset>",
            $renderedForm
        );
    }
}
