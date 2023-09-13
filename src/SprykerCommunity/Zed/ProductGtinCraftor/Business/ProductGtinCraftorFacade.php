<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ProductGtinCraftorBusinessFactory getFactory()
 */
class ProductGtinCraftorFacade extends AbstractFacade implements ProductGtinCraftorFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractWithGtinData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $productAbstractTransfer;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractWithOpenAIData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $productAbstractTransfer;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbsractWithLMIVData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $productAbstractTransfer;
    }

    public function craftProduct(string $gtin, string $abstractSKU, ?int $price)
    {
        return $this->getFactory()->createProductCraftor()->craftProduct($gtin, $abstractSKU, $price);
    }
}
