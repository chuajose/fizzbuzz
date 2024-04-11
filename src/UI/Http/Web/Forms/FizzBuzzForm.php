<?php

declare(strict_types=1);

namespace App\UI\Http\Web\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;

class FizzBuzzForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('begin', IntegerType::class, [
                'label' => 'Initial Number',
                'attr' => [
                    'min' => 0,
                ],
            ])
            ->add('last', IntegerType::class, [
                'label' => 'Last Number',
                'attr' => [
                    'min' => 0,
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
            'constraints' => [
                new NotBlank(),
                new GreaterThanOrEqual(0),
                new BeginLessThanLast(),
            ],
        ]);
    }
}
