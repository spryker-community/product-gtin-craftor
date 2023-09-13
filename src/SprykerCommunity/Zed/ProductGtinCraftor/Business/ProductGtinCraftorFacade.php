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
     * @param string $gtin
     * @param string $abstractSKU
     * @param int|null $price
     * @return int
     */
    public function craftProduct(string $gtin, string $abstractSKU, ?int $price): int
    {
        return $this->getFactory()->createProductCraftor()->craftProduct($gtin, $abstractSKU, $price);
    }
}
