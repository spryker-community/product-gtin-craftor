<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types=1);

namespace SprykerCommunity\Client\UpcDatabase;

use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \SprykerCommunity\Client\UpcDatabase\UpcDatabaseFactory getFactory()
 */
class UpcDatabaseClient extends AbstractClient implements UpcDatabaseClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\UpcRequestTransfer $upcProductRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UpcResponseTransfer
     */
    public function product(UpcRequestTransfer $upcProductRequestTransfer): UpcResponseTransfer
    {
        return $this->getFactory()
            ->createApiClient()
            ->product($upcProductRequestTransfer);
    }
}
