<?php

declare(strict_types=1);

namespace App\Tests\Form;

use App\UI\Http\Web\Forms\FizzBuzzForm;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\Test\TypeTestCase;
use Symfony\Component\Validator\Validation;

class FizzBuzzFormTest extends TypeTestCase
{
    protected function getExtensions(): array
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        return [
            new ValidatorExtension($validator),
        ];
    }

    public function testSubmitValidData(): void
    {
        $formData = [
            'begin' => 1,
            'last' => 20,
        ];

        $form = $this->factory->create(FizzBuzzForm::class, $formData);
        $form->submit($formData);

        $this->assertTrue($form->isValid());
        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($formData, $form->getData());
    }

    public function testSubmitInvalidData(): void
    {
        $formData = [
            'begin' => 111,
            'last' => 0,
        ];

        $form = $this->factory->create(FizzBuzzForm::class, $formData);
        $form->submit($formData);
        $form->isSynchronized();

        $this->assertFalse($form->isValid());
        $this->assertGreaterThan(0, $form->getErrors()->count());
    }
}
