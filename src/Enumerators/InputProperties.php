<?php

namespace App\Enumerators;

/**
 * Backed Enumerator with Input Properties that are well known that can be
 * added manually to an Input
 */
enum InputProperties: string
{
    case READONLY = 'readonly';
    case DISABLED = 'disabled';
    case MAXLENGTH = 'maxlength';
    case MIN = 'min';
    case MAX = 'max';
    case MULTIPLE = 'multiple';
    case AUTOCOMPLETE = 'autocomplete';
}