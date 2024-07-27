<?php

// Load the autoloader on the project
require './vendor/autoload.php';

use App\Components\DOM\Page;

// Create a new Page
$page = new Page('Form Challenge');

// Render the page and print the result
print $page->render();