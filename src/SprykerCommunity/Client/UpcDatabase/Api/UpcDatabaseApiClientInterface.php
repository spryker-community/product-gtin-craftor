<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerCommunity\Client\UpcDatabase\Api;

use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;

interface UpcDatabaseApiClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\UpcRequestTransfer $upcProductRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UpcResponseTransfer
     */
    public function product(UpcRequestTransfer $upcProductRequestTransfer): UpcResponseTransfer;
}
