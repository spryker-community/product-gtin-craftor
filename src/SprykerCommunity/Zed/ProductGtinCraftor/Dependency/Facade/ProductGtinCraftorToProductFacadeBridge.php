<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class ProductGtinCraftorToProductFacadeBridge implements ProductGtinCraftorToProductFacadeBridgeInterface
{

    public function __construct(protected ProductFacadeInterface $productFacade){}

    /**
     * Specification:
     * - Saves abstract product attributes.
     * - Saves abstract product localized attributes.
     * - Saves abstract product meta data.
     * - Updates the URL of an active abstract product if it is changed.
     * - Triggers "before" and "after" CREATE plugins.
     * - Throws exception if an abstract product with the same SKU exists.
     * - Does not activate or touche created abstract product.
     * - Returns the ID of the newly created abstract product.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException
     *
     * @return int
     */
    public function saveProductAbstract(ProductAbstractTransfer $productAbstractTransfer){
        return $this->productFacade->saveProductAbstract($productAbstractTransfer);
    }
    /**
     * Specification:
     * - Adds abstract product attributes.
     * - Adds abstract product localized attributes.
     * - Adds abstract product meta data.
     * - Triggers "before" and "after" CREATE plugins.
     * - Throws exception if an abstract product with the same SKU exists.
     * - Returns the ID of the newly created abstract product.
     * - Does not activate or touche created abstract product.
     * - Executes `ProductAbstractPreCreatePluginInterface` stack of plugins.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException
     *
     * @return int
     */
    public function createProductAbstract(ProductAbstractTransfer $productAbstractTransfer): int
    {
        return $this->productFacade->createProductAbstract($productAbstractTransfer);
    }

    public function createProductConcrete(ProductConcreteTransfer $productConcreteTransfer): int
    {
        return $this->productFacade->createProductConcrete($productConcreteTransfer);
    }
}