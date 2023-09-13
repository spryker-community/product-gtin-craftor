<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Client;

use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;

interface ProductGtinCraftorToUpcDatabaseClientInterface
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