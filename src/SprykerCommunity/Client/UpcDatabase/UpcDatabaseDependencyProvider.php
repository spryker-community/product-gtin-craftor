<?php

declare(strict_types=1);

namespace Pyz\Client\UpcDatabase;

use GuzzleHttp\Client;
use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class UpcDatabaseDependencyProvider extends AbstractDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_GUZZLE_HTTP = 'CLIENT_GUZZLE_HTTP';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container = $this->addGuzzleHttpClient($container);

        return $container;
    }

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    private function addGuzzleHttpClient(Container $container): Container
    {
        $container->set(self::CLIENT_GUZZLE_HTTP, function (Container $container) {
            return new Client();
        });

        return $container;
    }
}
