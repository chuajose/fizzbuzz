<?php

declare(strict_types=1);

namespace App\UI\Http\Web\Controllers;

use App\Application\FizzBuzz\Dto\FizzBuzzParamsDto;
use App\Application\FizzBuzz\GenerateFizzBuzzSequence;
use App\UI\Http\Web\Forms\FizzBuzzForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FizzBuzzController extends BaseController
{
    public function __construct(private readonly GenerateFizzBuzzSequence $generateFizzBuzzSequence)
    {
    }

    #[Route('/desafio/fizz/buzz', name: 'fizzbuzz', methods: [Request::METHOD_POST, Request::METHOD_GET])]
    public function __invoke(Request $request): Response
    {
        $result = null;
        $form = $this->createForm(FizzBuzzForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && is_array($form->getData())) {
            $data = [
                'begin' => (isset($form->getData()['begin'])) ? (int) $form->getData()['begin'] : 0,
                'last' => (isset($form->getData()['last'])) ? (int) $form->getData()['last'] : 0,
            ];
            $fizzBuzz = $this->generateFizzBuzzSequence->execute(FizzBuzzParamsDto::fromArray($data));
            $result = $fizzBuzz->result();
        }

        return $this->render('desafio/list.html.twig', [
            'form' => $form->createView(),
            'result' => $result,
            'posts' => [],
            'total' => 0,
            'currentPage' => 0,
            'limit' => 0,
            'totalPages' => 0,
        ]);
    }
}
