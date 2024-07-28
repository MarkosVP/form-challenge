<?php

// Load the autoloader on the project
require_once __DIR__ . '/../vendor/autoload.php';

use App\Components\Dom\Page;

// Create a new Page
$page = new Page('Form Challenge');

// Render the page and print the result
print $page->render();