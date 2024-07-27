<?php

namespace App\Enumerators;

/**
 * Backed Enumerator with the Input Types that can be used
 *
 * Types obtained from https://www.w3schools.com/html/html_form_input_types.asp
 */
enum InputType: string {
    /** Button Input Type */
    case BUTTON = 'button';

    /** Checkbox Input Type */
    case CHECKBOX = 'checkbox';

    /** Date Input Type */
    case DATE = 'date';

    /** Email Input Type */
    case EMAIL = 'email';

    /** File Input Type */
    case FILE = 'file';

    /** Month Input Type */
    case MONTH = 'month';

    /** Number Input Type */
    case NUMBER = 'number';

    /** Password Input Type */
    case PASSWORD = 'password';

    /** Search Input Type */
    case SEARCH = 'search';

    /** Submit Button Input Type */
    case SUBMIT = 'submit';

    /** Telephone Input Type */
    case TELEPHONE = 'tel';

    /** Text Input Type */
    case TEXT = 'text';

    /** Time Input Type */
    case TIME = 'time';

    /** URL Input Type */
    case URL = 'url';

    /** Week Input Type */
    case WEEK = 'week';
}