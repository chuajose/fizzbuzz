<?php

namespace ContainerCSAj5lq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUlid_FactoryService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'ulid.factory' shared service.
     *
     * @return \Symfony\Component\Uid\Factory\UlidFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/uid/Factory/UlidFactory.php';

        return $container->privates['ulid.factory'] = new \Symfony\Component\Uid\Factory\UlidFactory();
    }
}
