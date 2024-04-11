<?php

declare(strict_types=1);

namespace App\Application\FizzBuzz;

use App\Application\FizzBuzz\Dto\FizzBuzzParamsDto;
use App\Domain\FizzBuzz\Exception\FizzBuzzSequenceException;
use App\Domain\FizzBuzz\FizzBuzzRepository;
use App\Domain\FizzBuzz\Model\FizzBuzz;
use App\Domain\FizzBuzz\Service\CalculateFizzBuzz;
use App\Domain\FizzBuzz\ValueObject\FizzBuzzSequence;
use App\Domain\Shared\Messenger\MessengerBusInterface;

readonly class GenerateFizzBuzzSequence
{
    public function __construct(private MessengerBusInterface $messengerBus, private FizzBuzzRepository $fizzBuzzRepository)
    {
    }

    /**
     * @throws FizzBuzzSequenceException
     */
    public function execute(FizzBuzzParamsDto $params): FizzBuzz
    {
        /*
         * Llamamos al servicio que se encarga de calcular el FizzBuzz.
         * Se le pasa como dependencia  un objeto de valor FizzBuzzSequence que se crea a partir de los datos de entrada.
         * Este FizzBuzzSequence valida que los datos de entrada para poder calcular el FizzBuzz sean correctos, independientemente de que lo se hubiese validado previamente en el formulario, o en el dto
         * ya que al pertener al dominio, se asegura que los datos sean correctos si importar desde donde sea llamado este servicio (otro caso de uso, un command, etc..).
         */
        $fizzBuzzService = new CalculateFizzBuzz(FizzBuzzSequence::fromValues($params->begin(), $params->last()));
        $fizzBuzz = $fizzBuzzService->execute();

        /*
         * Una vez se ejecuta el servicio y se obtiene el resultado, se guarda en la base de datos y se envia un evento para notificar que se ha generado un nuevo FizzBuzz.
         * Ahora mismo este el evento unicamente genera un log con los datos del FizzBuzz, pero podria ser cualquier otra cosa, como enviar un email, notificar a un servicio externo, etc...
         */
        $this->fizzBuzzRepository->create($fizzBuzz);
        $this->messengerBus->dispatch(...$fizzBuzz->pullDomainEvents());

        return $fizzBuzz;
    }
}
