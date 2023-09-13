<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\OpenApi\OpenAiDataRetriever;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\Upc\UpcDataRetriever;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToOpenAiFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorDependencyProvider;

/**
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorConfig getConfig()
 */
class ProductGtinCraftorBusinessFactory extends AbstractBusinessFactory
{

    public function createOpenAiDataRetriever(): DataRetrieverInterface
    {
        return new OpenAiDataRetriever(
            $this->getOpenAiFacade(),
            $this->getConfig()
        );
    }

    public function createUpcDataRetriever()
    {
        return new UpcDataRetriever(
            $this->getUpcClient(),
            $this->getLocaleFacade()
        );
    }

    private function getOpenAiFacade(): ProductGtinCraftorToOpenAiFacadeInterface
    {
        return $this->getProvidedDependency(ProductGtinCraftorDependencyProvider::FACADE_OPEN_AI);
    }

}