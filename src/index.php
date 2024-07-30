<?php

// Load the autoloader on the project
require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Dom\Page;
use App\Components\Form\Form;
use App\Components\Input\ButtonInput;
use App\Components\Input\TextInput;
use App\Enumerators\InputType;

// Create a new Page
$page = new Page('Form Challenge');

// Create the form
$form = new Form('user-data');

// Create the first name field
$firstNameInput = new TextInput('first-name', 'First Name', 'Insert yout First Name', initialValue: 'Max');

// Create the last name field
$lastNameInput = new TextInput('last-name', 'Last Name', 'Insert yout Last Name', initialValue: 'Loeb');

// Create the submit button
$submitInput = new ButtonInput('submit-user-form', InputType::SUBMIT->value);

// Insert all Inputs inside the form
$form->addInput($firstNameInput);
$form->addInput($lastNameInput);
$form->addInput($submitInput);

// Insert the Form on the page
$page->addPageElement($form->render());

// Render the page and print the result
print $page->render();
