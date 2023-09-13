<?php

namespace SprykerDev\Zed\Console;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Transfer\Communication\Console\TransferGeneratorConsole;

class ConsoleDependencyProvider extends \Spryker\Zed\Console\ConsoleDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array<\Symfony\Component\Console\Command\Command>
     */
    protected function getConsoleCommands(Container $container)
    {
        return [
            new TransferGeneratorConsole(),
        ];
    }
}