<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

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
