<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace SprykerCommunity\Client\UpcDatabase;

use GuzzleHttp\ClientInterface;
use SprykerCommunity\Client\UpcDatabase\Api\UpcDatabaseApiClient;
use SprykerCommunity\Client\UpcDatabase\Api\UpcDatabaseApiClientInterface;
use SprykerCommunity\Client\UpcDatabase\Mapper\UpcDatabaseResponseMapper;
use SprykerCommunity\Client\UpcDatabase\Mapper\UpcDatabaseResponseMapperInterface;
use Spryker\Client\Kernel\AbstractFactory;

/**
 * @method \SprykerCommunity\Client\UpcDatabase\UpcDatabaseConfig getConfig()
 */
class UpcDatabaseFactory extends AbstractFactory
{
    /**
     * @return \SprykerCommunity\Client\UpcDatabase\Api\UpcDatabaseApiClientInterface
     */
    public function createApiClient(): UpcDatabaseApiClientInterface
    {
        return new UpcDatabaseApiClient(
            $this->getGuzzleHttpClient(),
            $this->getConfig(),
            $this->createUpcDatabaseResponseMapper(),
        );
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    protected function getGuzzleHttpClient(): ClientInterface
    {
        return $this->getProvidedDependency(UpcDatabaseDependencyProvider::CLIENT_GUZZLE_HTTP);
    }

    /**
     * @return \SprykerCommunity\Client\UpcDatabase\Mapper\UpcDatabaseResponseMapperInterface
     */
    protected function createUpcDatabaseResponseMapper(): UpcDatabaseResponseMapperInterface
    {
        return new UpcDatabaseResponseMapper();
    }
}
