<?php

declare(strict_types=1);

namespace App\UI\Http\Web\Forms;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class BeginLessThanLastValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof BeginLessThanLast) {
            throw new UnexpectedTypeException($constraint, BeginLessThanLast::class);
        }
        if (is_array($value)) {
            $being = $value['begin'];
            $lastValue = $value['last'];
            if ($being >= $lastValue) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ begin }}', (string) $being)
                    ->setParameter('{{ last }}', (string) $lastValue)
                    ->addViolation();
            }
        }
    }
}
