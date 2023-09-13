<?php

declare(strict_types=1);

namespace Pyz\Client\UpcDatabase;

use GuzzleHttp\ClientInterface;
use Pyz\Client\UpcDatabase\Api\UpcDatabaseApiClient;
use Pyz\Client\UpcDatabase\Api\UpcDatabaseApiClientInterface;
use Pyz\Client\UpcDatabase\Mapper\UpcDatabaseResponseMapper;
use Pyz\Client\UpcDatabase\Mapper\UpcDatabaseResponseMapperInterface;
use Spryker\Client\Kernel\AbstractFactory;

/**
 * @method \Pyz\Client\UpcDatabase\UpcDatabaseConfig getConfig()
 */
class UpcDatabaseFactory extends AbstractFactory
{
    public function createApiClient(): UpcDatabaseApiClientInterface
    {
        return new UpcDatabaseApiClient(
            $this->getGuzzleHttpClient(),
            $this->getConfig(),
            $this->createUpcDatabaseResponseMapper(),
        );
    }

    protected function getGuzzleHttpClient(): ClientInterface
    {
        return $this->getProvidedDependency(UpcDatabaseDependencyProvider::CLIENT_GUZZLE_HTTP);
    }

    protected function createUpcDatabaseResponseMapper(): UpcDatabaseResponseMapperInterface
    {
        return new UpcDatabaseResponseMapper();
    }
}
