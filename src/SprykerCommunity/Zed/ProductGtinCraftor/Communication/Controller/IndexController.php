<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerCommunity\Zed\ProductGtinCraftor\Communication\Controller;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Wel\Zed\Ingredient\Communication\Controller\ViewController;

/**
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\Communication\ProductGtinCraftorCommunicationFactory getFactory()
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\Business\ProductGtinCraftorFacadeInterface getFacade()
 */
class IndexController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Spryker\Zed\Product\Business\Exception\ProductAbstractExistsException
     */
    public function indexAction(Request $request): array|RedirectResponse
    {
        $productGtinForm = $this->getFactory()->createProductGtinCraftorForm([])->handleRequest($request);

        if($productGtinForm->isSubmitted() && $productGtinForm->isValid()){
            $gtin = $productGtinForm->getData()['gtin'];
            $sku = $productGtinForm->getData()['sku'];
            $price = $productGtinForm->getData()['price'];

            $id = $this->getFacade()->craftProduct($gtin, $sku, $price);

            return $this->redirectResponse(sprintf('/product-management/edit?id-product-abstract=%s', $id));
        }

        return $this->viewResponse(
            [
                'productGtinForm' => $productGtinForm->createView(),
            ],
        );
    }
}
