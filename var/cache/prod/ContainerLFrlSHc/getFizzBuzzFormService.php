<?php

namespace ContainerLFrlSHc;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFizzBuzzFormService extends App_KernelProdContainer
{
    /*
     * Gets the private 'App\UI\Http\Web\Forms\FizzBuzzForm' shared autowired service.
     *
     * @return \App\UI\Http\Web\Forms\FizzBuzzForm
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['App\\UI\\Http\\Web\\Forms\\FizzBuzzForm'] = new \App\UI\Http\Web\Forms\FizzBuzzForm();
    }
}
