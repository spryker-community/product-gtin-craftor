<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerCommunity\Zed\ProductGtinCraftor\Communication\Form;

use Spryker\Zed\Kernel\Communication\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\Business\ProductGtinCraftorFacadeInterface getFacade()
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\Communication\ProductGtinCraftorCommunicationFactory getFactory()
 * @method \SprykerCommunity\Zed\ProductGtinCraftor\ProductGtinCraftorConfig getConfig()
 */
class ProductGtinCraftorForm extends AbstractType
{
/**
 * @var string
 */
    protected const FIELD_GTIN = 'gtin';

/**
 * @var string
 */
    protected const FIELD_SKU = 'sku';

/**
 * @var string
 */
    protected const FIELD_PRICE = 'price';

/**
 * @param \Symfony\Component\Form\FormBuilderInterface $builder
 * @param array $options
 *
 * @return void
 */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addProductGtinCraftorForm($builder, $options);
    }

/**
 * @param \Symfony\Component\Form\FormBuilderInterface $builder
 * @param array $options
 *
 * @return $this
 */
    protected function addProductGtinCraftorForm(FormBuilderInterface $builder, array $options): static
    {
        $builder->add(
            static::FIELD_GTIN,
            TextType::class,
            [
            'label' => 'GTIN',
            'required' => true,
            ],
        );

        $builder->add(
            static::FIELD_SKU,
            TextType::class,
            [
            'label' => 'SKU',
            'required' => false,
            ],
        );

        $builder->add(
            static::FIELD_PRICE,
            TextType::class,
            [
            'label' => 'Price',
            'required' => true,
            ],
        );

        return $this;
    }
}
