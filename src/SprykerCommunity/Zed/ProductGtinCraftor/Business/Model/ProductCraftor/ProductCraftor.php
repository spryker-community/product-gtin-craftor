<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\ProductCraftor;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\Upc\UpcDataRetriever;

class ProductCraftor implements ProductCraftorInterface
{

    /**
     * @var \SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\Upc\UpcDataRetriever
     */
    private DataRetrieverInterface $upcRetriever;

    /**
     * @var \SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever\OpenApi\OpenAiDataRetriever
     */
    private DataRetrieverInterface $openAirRetriever;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param DataRetrieverInterface $upcRetriever
     * @param DataRetrieverInterface $openAirRetriever
     */
    public function __construct(DataRetrieverInterface $upcRetriever, DataRetrieverInterface $openAirRetriever, ProductFacadeInterface $productFacade)
    {
        $this->upcRetriever = $upcRetriever;
        $this->openAirRetriever = $openAirRetriever;
        $this->productFacade = $productFacade;
    }

    /**
     * @param string $gtin
     * @param string $productAbstractSku
     * @param int|null $price
     * @return ProductAbstractTransfer
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException
     */
    public function craftProduct(string $gtin, string $productAbstractSku, ?int $price = 1): ProductAbstractTransfer
    {
        $productAbstractTransfer = new ProductAbstractTransfer();
        $productAbstractTransfer->setGtin($gtin);
        $productAbstractTransfer->setSku($productAbstractSku);

        $productAbstractTransfer = $this->upcRetriever->retrieveProductData($productAbstractTransfer);
        $productAbstractTransfer = $this->openAirRetriever->retrieveProductData($productAbstractTransfer);

        $this->productFacade->createProductAbstract($productAbstractTransfer);

        return $productAbstractTransfer;
    }
}
