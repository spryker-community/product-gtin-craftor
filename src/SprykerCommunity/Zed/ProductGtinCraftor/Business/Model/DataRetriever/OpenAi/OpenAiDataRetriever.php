<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\OpenApi;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\OpenAiCreateResponseTransfer;
use Generated\Shared\Transfer\OpenAiExecuteRequestTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToOpenAiFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorConfigInterface;

class OpenAiDataRetriever implements DataRetrieverInterface
{

    protected ProductGtinCraftorToOpenAiFacadeInterface $openAiFacade;

    protected string $event;

    /**
     * @param ProductGtinCraftorToOpenAiFacadeInterface $openAiFacade
     */
    public function __construct(ProductGtinCraftorToOpenAiFacadeInterface $openAiFacade, ProductGtinCraftorConfigInterface $config)
    {
        $this->openAiFacade = $openAiFacade;
        $this->event = $config->getAiGtinEvent();
    }

    /**
     * @param ProductAbstractTransfer $productAbstractTransfer
     * @return ProductAbstractTransfer
     */
    public function retrieveProductData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        if ($productAbstractTransfer->getLocalizedAttributes()->count() > 0) {
            /** @var LocalizedAttributesTransfer $localizedAttributes */
            $localizedAttributes = $productAbstractTransfer->getLocalizedAttributes()->getIterator()->current();

            $openAiResponse = $this->retrieveOpenAiResponse($localizedAttributes, $productAbstractTransfer);

            if (count($openAiResponse->getChoices()) > 0){
                $localizedAttributes->setDescription(current($openAiResponse->getChoices()));
            }
        }

        return $productAbstractTransfer;
    }

    /**
     * @param LocalizedAttributesTransfer $localizedAttributes
     * @param ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\OpenAiCreateResponseTransfer
     */
    protected function retrieveOpenAiResponse(LocalizedAttributesTransfer $localizedAttributes, ProductAbstractTransfer $productAbstractTransfer): OpenAiCreateResponseTransfer
    {
        $executeRequest = new OpenAiExecuteRequestTransfer();
        $executeRequest->setEvent($this->event);
        $executeRequest->setContext(
            [
                'PRODUCT_NAME' => $localizedAttributes->getName(),
                'TITLE' => $localizedAttributes->getName(),
                'BRAND' => $productAbstractTransfer->getUpcBrand(),
                'MANUFACTURER' => $productAbstractTransfer->getUpcManufacturer(),
                'CATEGORY' => $productAbstractTransfer->getUpcCategory(),
            ]
        );

        return $this->openAiFacade->executePromptAction($executeRequest);
    }

}