<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace SprykerCommunity\Client\UpcDatabase\Api;

use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;
use GuzzleHttp\ClientInterface;
use SprykerCommunity\Client\UpcDatabase\Mapper\UpcDatabaseResponseMapperInterface;
use SprykerCommunity\Client\UpcDatabase\UpcDatabaseConfig;

class UpcDatabaseApiClient implements UpcDatabaseApiClientInterface
{
    protected ClientInterface $guzzleHttpClient;

    protected UpcDatabaseConfig $config;

    protected UpcDatabaseResponseMapperInterface $upcDatabaseResponseMapper;

    /**
     * @param \GuzzleHttp\ClientInterface $guzzleHttpClient
     * @param \Pyz\Client\UpcDatabase\UpcDatabaseConfig $config
     */
    public function __construct(
        ClientInterface $guzzleHttpClient,
        UpcDatabaseConfig $config,
        UpcDatabaseResponseMapperInterface $upcDatabaseResponseMapper,
    ) {
        $this->guzzleHttpClient = $guzzleHttpClient;
        $this->config = $config;
        $this->upcDatabaseResponseMapper = $upcDatabaseResponseMapper;
    }

    /**
     * @param \Generated\Shared\Transfer\UpcRequestTransfer $upcProductRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UpcResponseTransfer
     */
    public function product(UpcRequestTransfer $upcProductRequestTransfer): UpcResponseTransfer
    {
        $response = $this->guzzleHttpClient
            ->request(
                'GET',
                sprintf('%s%s', $this->config->getUpcDatabaseProductEndpoint(), $upcProductRequestTransfer->getUpcNumber()),
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->config->getUpcDatabaseApiKey(),
                    ],
                ],
            );

        return $this->upcDatabaseResponseMapper
            ->mapUpcDatabaseResponseToUpcResponseTransfer(
                json_decode($response->getBody()->getContents(), true),
            );
    }
}
