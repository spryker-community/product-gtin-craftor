<?php

declare(strict_types=1);

namespace Pyz\Client\UpcDatabase;

use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;

interface UpcDatabaseClientInterface
{
    /**
     * Specification:
     * - Query UPC database for product information.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\UpcRequestTransfer $upcProductRequestTransfer
     *
     * @return \Generated\Shared\Transfer\UpcResponseTransfer
     */
    public function product(UpcRequestTransfer $upcProductRequestTransfer): UpcResponseTransfer;
}
