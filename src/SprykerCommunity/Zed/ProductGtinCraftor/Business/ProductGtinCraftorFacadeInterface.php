<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business;

use Generated\Shared\Transfer\ProductAbstractTransfer;

interface ProductGtinCraftorFacadeInterface
{
    /**
     * Expands Product with GTIN Data
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractWithGtinData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;

    /**
     * Expands Product with OpenAI Data
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractWithOpenAIData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;

    /**
     * Expands Product with LMIV Data
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbsractWithLMIVData(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;
}
