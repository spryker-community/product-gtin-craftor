<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\ProductCraftor;

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
     * @param DataRetrieverInterface $upcRetriever
     * @param DataRetrieverInterface $openAirRetriever
     */
    public function __construct(DataRetrieverInterface $upcRetriever, DataRetrieverInterface $openAirRetriever)
    {
        $this->upcRetriever = $upcRetriever;
        $this->openAirRetriever = $openAirRetriever;
    }


    public function craftProduct(string $gtin, string $productAbstractSku, ?int $price = 1)
    {
        // TODO: Implement craftProduct() method.
    }

}