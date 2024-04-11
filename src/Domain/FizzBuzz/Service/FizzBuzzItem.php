<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Service;

use App\Domain\FizzBuzz\Service\Rules\BuzzRule;
use App\Domain\FizzBuzz\Service\Rules\FizzBuzzRule;
use App\Domain\FizzBuzz\Service\Rules\FizzRule;
use App\Domain\FizzBuzz\Service\Rules\Rule;

class FizzBuzzItem
{
    /**
     * @var array<Rule>
     */
    private array $rules;

    public function __construct()
    {
        $this->rules = [];
        /*
         * Defino las reglas que van a ser consideradas para decicir si un numero es FizzBuzz, Fizz o Buzz y el orden en el que se van a ejecutar,
         * que en este caso es importante para poder determinar si un número es FizzBuzz, ya que la primera regla
         * es saber si es divisible por 3 y 5, si no lo es, se sigue con las siguientes reglas.
         *
         * Si añadir reglas fuese algo más habitual, se podría hacer un refactor y crear un builder que se encargase de añadir las reglas al array de rules
         * y que se encargase de ordenarlas.
         */
        $this->rules[] = new FizzBuzzRule();
        $this->rules[] = new BuzzRule();
        $this->rules[] = new FizzRule();
    }

    public function value(int $number): string
    {
        foreach ($this->rules as $rule) {
            /*
             * Si la regla es válida para el número, devuelvo el valor de la regla.
             * Si no es válida, se sigue con la siguiente regla.
             */
            if ($rule->isValid($number)) {
                return $rule->value();
            }
        }

        // Si no se cumple ninguna regla, devuelvo el número como string.
        return (string) $number;
    }
}
