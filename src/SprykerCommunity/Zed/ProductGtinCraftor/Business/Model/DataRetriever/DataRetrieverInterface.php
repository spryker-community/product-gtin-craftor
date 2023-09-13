<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\DataRetriever;

use Generated\Shared\Transfer\ProductAbstractTransfer;

interface DataRetrieverInterface
{

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function retrieveProductData(ProductAbstractTransfer $productAbstractTransfer);
}