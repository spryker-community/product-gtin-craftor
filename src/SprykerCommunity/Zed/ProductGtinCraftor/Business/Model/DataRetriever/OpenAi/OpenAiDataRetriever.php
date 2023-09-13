<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\OpenApi;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToOpenAiFacadeInterface;

class OpenAiDataRetriever implements DataRetrieverInterface
{

    protected ProductGtinCraftorToOpenAiFacadeInterface $openAiFacade;

    /**
     * @param ProductGtinCraftorToOpenAiFacadeInterface $openAiFacade
     */
    public function __construct(ProductGtinCraftorToOpenAiFacadeInterface $openAiFacade)
    {
        $this->openAiFacade = $openAiFacade;
    }

    public function retrieveProductData(ProductAbstractTransfer $productAbstractTransfer)
    {
        #$this->openAiFacade->
    }

}