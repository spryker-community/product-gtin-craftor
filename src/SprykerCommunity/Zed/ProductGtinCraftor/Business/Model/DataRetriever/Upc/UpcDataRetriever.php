<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\Upc;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Pyz\Client\UpcDatabase\UpcDatabaseClientInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\DataRetrieverInterface;

#use SprykerCommunity\Client\UpcDatabase\UpcDatabaseClientInterface;

class UpcDataRetriever implements DataRetrieverInterface
{

    private UpcDatabaseClientInterface $upcDatabaseClient;

    /**
     * @param UpcDatabaseClientInterface $upcDatabaseClient
     */
    public function __construct(UpcDatabaseClientInterface $upcDatabaseClient)
    {
        $this->upcDatabaseClient = $upcDatabaseClient;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function retrieveProductData(ProductAbstractTransfer $productAbstractTransfer)
    {
        $upcRequest = new UpcRequestTransfer();
        $upcRequest->setUpcNumber($productAbstractTransfer->getGtin());

        $upcResponse = $this->upcDatabaseClient->product($upcRequest);

        $productAbstractTransfer->setName($upcResponse->getTitle());
        $productAbstractTransfer->setDescription($upcResponse->getDescription());

        return $productAbstractTransfer;
    }

}