<?php

declare(strict_types=1);

namespace SprykerCommunity\Client\UpcDatabase;

use Spryker\Client\Kernel\AbstractBundleConfig;

class UpcDatabaseConfig extends AbstractBundleConfig
{
    public function getUpcDatabaseProductEndpoint(): string
    {
        return $this->get('UPC_DATABASE_PRODUCT_ENDPOINT');
    }

    public function getUpcDatabaseApiKey(): string
    {
        return $this->get('UPC_DATABASE_API_KEY');
    }
}
