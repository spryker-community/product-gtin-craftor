<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\OpenApi\OpenAiDataRetriever;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\Upc\UpcDataRetriever;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\ProductCraftor\ProductCraftor;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Client\ProductGtinCraftorToUpcDatabaseClientInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToOpenAiFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorDependencyProvider;

/**
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorConfig getConfig()
 */
class ProductGtinCraftorBusinessFactory extends AbstractBusinessFactory
{

    public function createProductCraftor()
    {
        new ProductCraftor(
            $this->createUpcDataRetriever(),
            $this->createOpenAiDataRetriever(),
            $this->getProductFacade()
        );
    }

    /**
     * @return DataRetrieverInterface
     */
    public function createOpenAiDataRetriever(): DataRetrieverInterface
    {
        return new OpenAiDataRetriever(
            $this->getOpenAiFacade(),
            $this->getConfig()
        );
    }

    public function createUpcDataRetriever(): DataRetrieverInterface
    {
        return new UpcDataRetriever(
            $this->getUpcClient(),
            $this->getLocaleFacade()
        );
    }

    protected function getOpenAiFacade(): ProductGtinCraftorToOpenAiFacadeInterface
    {
        return $this->getProvidedDependency(ProductGtinCraftorDependencyProvider::FACADE_OPEN_AI);
    }

    protected function getUpcClient(): ProductGtinCraftorToUpcDatabaseClientInterface
    {
        return $this->getProvidedDependency(ProductGtinCraftorDependencyProvider::CLIENT_UPC_DATABASE);
    }

    protected function getLocaleFacade(): ProductGtinCraftorToLocaleFacadeInterface
    {
        return $this->getProvidedDependency(ProductGtinCraftorDependencyProvider::FACADE_LOCALE);
    }

    protected function getProductFacade(): ProductGtinCraftorToLocaleFacadeInterface
    {
        return $this->getProvidedDependency(ProductGtinCraftorDependencyProvider::FACADE_PRODUCT);
    }
}
