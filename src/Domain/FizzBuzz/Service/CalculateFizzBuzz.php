<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Service;

use App\Domain\FizzBuzz\Model\FizzBuzz;
use App\Domain\FizzBuzz\ValueObject\FizzBuzzSequence;

readonly class CalculateFizzBuzz
{
    public function __construct(private FizzBuzzSequence $sequence)
    {
    }

    public function execute(): FizzBuzz
    {
        /*
         * Defino un servicio que contiene el tipo de reglas que van a decidir si un número es Fizz, Buzz o FizzBuzz. Como indico en el comentario de la clase,
         * si fuese necesario añadir más reglas, se podrian añadir aqui como dependencias, o se podría hacer un refactor y crear un builder que se encargase de añadir las reglas al array de rules y que se encargase de ordenarlas.
         * Para cada número de la secuencia, se va a comprobar si cumple alguna de las reglas, y en caso de que no cumpla ninguna, se devolverá el número como string.
         * El resultado de este servicio es un array de strings con los valores de la secuencia.
         *
         * Devuelvo la entidad de tipo FizzBuzz con los datos necesarios.
         */
        $fizzBuzzService = new FizzBuzzItem();
        $result = [];
        for ($i = $this->sequence->begin(); $i <= $this->sequence->last(); ++$i) {
            $result[] = $fizzBuzzService->value($i);
        }

        return FizzBuzz::create($this->sequence->begin(), $this->sequence->last(), $result);
    }
}
