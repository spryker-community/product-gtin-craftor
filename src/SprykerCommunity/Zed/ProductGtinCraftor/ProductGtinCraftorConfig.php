<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor;

use Spryker\Zed\Kernel\AbstractBundleConfig;
use SprykerCommunity\Shared\ProductGtinCraftor\ProductGtinCraftorConfig as SharedProductGtinCraftorConfig;

class ProductGtinCraftorConfig extends AbstractBundleConfig implements ProductGtinCraftorConfigInterface
{

    /**
     * @return string
     */
    public function getAiGtinEvent(): string
    {
        return $this->get(SharedProductGtinCraftorConfig::OPEN_AI_GTIN_EVENT, 'product-description-conversational-en');
    }

}