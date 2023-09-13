<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Client;

use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;

class ProductGtinCraftorToUpcDatabaseClientBridge implements ProductGtinCraftorToUpcDatabaseClientInterface
{

    /**
     * @var \SprykerCommunity\Client\UpcDatabase\UpcDatabaseClientInterface
     */
    protected $upcDatabaseClient;

    /**
     * @param \SprykerCommunity\Client\UpcDatabase\UpcDatabaseClientInterface $upcDatabaseClient
     */
    public function __construct($upcDatabaseClient)
    {
        $this->upcDatabaseClient = $upcDatabaseClient;
    }

    /**
     * @param UpcRequestTransfer $upcProductRequestTransfer
     * @return UpcResponseTransfer
     */
    public function product(UpcRequestTransfer $upcProductRequestTransfer): UpcResponseTransfer
    {
        return $this->upcDatabaseClient->product($upcProductRequestTransfer);
    }

}