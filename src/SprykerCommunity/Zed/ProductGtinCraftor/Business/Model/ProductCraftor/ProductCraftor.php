<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\Model\ProductCraftor;

use Generated\Shared\Transfer\CurrencyTransfer;
use Generated\Shared\Transfer\MoneyValueTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\PriceTypeTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Business\Model\DataRetriever\DataRetrieverInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToProductFacadeBridgeInterface;

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
     * @param ProductFacadeInterface $productFacade
     */
    public function __construct(DataRetrieverInterface $upcRetriever, DataRetrieverInterface $openAirRetriever, ProductGtinCraftorToProductFacadeBridgeInterface $productFacade)
    {
        $this->upcRetriever = $upcRetriever;
        $this->openAirRetriever = $openAirRetriever;
        $this->productFacade = $productFacade;
    }

    /**
     * @param string $gtin
     * @param string $productAbstractSku
     * @param int|null $price
     * @return int
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException
     */
    public function craftProduct(string $gtin, string $productAbstractSku, ?int $price = 1): int
    {
        $productAbstractTransfer = new ProductAbstractTransfer();
        $productAbstractTransfer->setGtin($gtin);
        $productAbstractTransfer->setSku($productAbstractSku);
        $productAbstractTransfer->setIdTaxSet(1);

        $priceTypeTransfer = (new PriceTypeTransfer())
            ->setIdPriceType(1)
            ->setName('DEFAULT');

        $moneyValueTransfer = (new MoneyValueTransfer())
            ->setFkCurrency(93)
            ->setFkStore(1)
            ->setNetAmount($price)
            ->setGrossAmount($price);

        $priceProductTransfer = (new PriceProductTransfer())
            ->setMoneyValue($moneyValueTransfer)
            ->setPriceType($priceTypeTransfer);

        $productAbstractTransfer->addPrice($priceProductTransfer);

        $productAbstractTransfer = $this->upcRetriever->retrieveProductData($productAbstractTransfer);
        $productAbstractTransfer = $this->openAirRetriever->retrieveProductData($productAbstractTransfer);

        $idProductAbstract = $this->productFacade->createProductAbstract($productAbstractTransfer);

        $priceProductTransfer = (new PriceProductTransfer())
            ->setMoneyValue($moneyValueTransfer)
            ->setPriceType($priceTypeTransfer);

        $productConcreteTransfer = (new ProductConcreteTransfer())
            ->setIsActive(true)
            ->addPrice($priceProductTransfer)
            ->setSku($productAbstractSku . '-1')
            ->setFkProductAbstract($idProductAbstract)
            ->setLocalizedAttributes($productAbstractTransfer->getLocalizedAttributes());

        $this->productFacade
            ->createProductConcrete($productConcreteTransfer);

        return $idProductAbstract;
    }
}
