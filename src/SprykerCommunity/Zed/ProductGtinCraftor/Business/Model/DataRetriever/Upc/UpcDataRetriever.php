<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\Model\DataRetriever\Upc;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\Model\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Client\ProductGtinCraftorToUpcDatabaseClientInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeInterface;

class UpcDataRetriever implements DataRetrieverInterface
{

    protected ProductGtinCraftorToUpcDatabaseClientInterface $upcDatabaseClient;

    protected ProductGtinCraftorToLocaleFacadeInterface $localeFacade;

    /**
     * @param \SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Client\ProductGtinCraftorToUpcDatabaseClientInterface $upcDatabaseClient
     * @param \SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeInterface $localeFacade
     */
    public function __construct(ProductGtinCraftorToUpcDatabaseClientInterface $upcDatabaseClient, ProductGtinCraftorToLocaleFacadeInterface $localeFacade)
    {
        $this->upcDatabaseClient = $upcDatabaseClient;
        $this->localeFacade = $localeFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function retrieveProductData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        $upcRequest = new UpcRequestTransfer();
        $upcRequest->setUpcNumber($productAbstractTransfer->getGtin());

        /** @var UpcResponseTransfer $upcResponse */
        $upcResponse = $this->upcDatabaseClient->product($upcRequest);

        $productAbstractTransfer->setUpcBrand($upcResponse->getBrand());
        $productAbstractTransfer->setUpcCategory($upcResponse->getCategory());
        $productAbstractTransfer->setUpcManufacturer($upcResponse->getManufacturer());

        $productAbstractTransfer->addLocalizedAttributes(
            $this->composeLocalizedAttribute($upcResponse)
        );

        return $productAbstractTransfer;
    }

    /**
     * @param UpcResponseTransfer $upcResponse
     * @return LocalizedAttributesTransfer
     */
    protected function composeLocalizedAttribute(UpcResponseTransfer $upcResponse): LocalizedAttributesTransfer
    {
        $localizedAttribute = new LocalizedAttributesTransfer();
        $localizedAttribute->setName($upcResponse->getTitle());
        $localizedAttribute->setLocale($this->localeFacade->getCurrentLocale());

        return $localizedAttribute;
    }

}