<?php

declare(strict_types=1);

namespace App\UI\Http\Web\Forms;

use Symfony\Component\Validator\Constraint;

class BeginLessThanLast extends Constraint
{
    public string $message = 'The begin number "{{ begin }}" cannot be greater or equal than the final number "{{ last }}".';
}
