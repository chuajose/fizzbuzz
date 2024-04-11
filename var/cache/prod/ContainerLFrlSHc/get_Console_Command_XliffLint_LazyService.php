<?php

namespace ContainerLFrlSHc;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Console_Command_XliffLint_LazyService extends App_KernelProdContainer
{
    /*
     * Gets the private '.console.command.xliff_lint.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.console.command.xliff_lint.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('lint:xliff', [], 'Lint an XLIFF file and outputs encountered errors', false, #[\Closure(name: 'console.command.xliff_lint', class: 'Symfony\\Component\\Translation\\Command\\XliffLintCommand')] fn (): \Symfony\Component\Translation\Command\XliffLintCommand => ($container->privates['console.command.xliff_lint'] ?? $container->load('getConsole_Command_XliffLintService')));
    }
}
