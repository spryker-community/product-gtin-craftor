<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\Upc;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\UpcRequestTransfer;
use Generated\Shared\Transfer\UpcResponseTransfer;
use SprykerCommunity\Client\UpcDatabase\UpcDatabaseClientInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeInterface;

class UpcDataRetriever implements DataRetrieverInterface
{

    protected UpcDatabaseClientInterface $upcDatabaseClient;

    protected ProductGtinCraftorToLocaleFacadeInterface $localeFacade;

    /**
     * @param \SprykerCommunity\Client\UpcDatabase\UpcDatabaseClientInterface $upcDatabaseClient
     * @param \SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeInterface $localeFacade
     */
    public function __construct(UpcDatabaseClientInterface $upcDatabaseClient, ProductGtinCraftorToLocaleFacadeInterface $localeFacade)
    {
        $this->upcDatabaseClient = $upcDatabaseClient;
        $this->localeFacade = $localeFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function retrieveProductData(ProductAbstractTransfer $productAbstractTransfer)
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