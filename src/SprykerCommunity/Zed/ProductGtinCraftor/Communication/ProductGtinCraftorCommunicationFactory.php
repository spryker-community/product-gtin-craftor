<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerCommunity\Zed\ProductGtinCraftor\Communication;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerCommunity\Zed\ProductGtinCraftor\Communication\Form\ProductGtinCraftorForm;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToProductFacadeBridgeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorDependencyProvider;
use Symfony\Component\Form\FormInterface;

/**
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\Business\ProductGtinCraftorFacadeInterface getFacade()
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorConfig getConfig()
 */
class ProductGtinCraftorCommunicationFactory extends AbstractCommunicationFactory
{
    public function createProductGtinCraftorForm(array $data, array $options = []): FormInterface
    {
        return $this->getFormFactory()->create(ProductGtinCraftorForm::class, $data, $options);
    }


    public function getProductFacade(): ProductGtinCraftorToProductFacadeBridgeInterface
    {
        return $this->getProvidedDependency(ProductGtinCraftorDependencyProvider::FACADE_PRODUCT);
    }
}
