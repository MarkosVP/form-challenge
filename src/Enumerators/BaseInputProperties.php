<?php

namespace App\Enumerators;

/**
 * Backed Enumerator with Input Properties that are required and
 * should not be allowed to be used as custom
 */
enum BaseInputProperties: string
{
    // User Properties
    case ID = 'id';
    case TYPE = 'type';
    case VALUE = 'value';
    case PLACEHOLDER = 'placeholder';

    // Unused Properties that should not be applied on the code
    case SIZE = 'size';
    case WIDTH = 'width';
    case HEIGHT = 'height';
}