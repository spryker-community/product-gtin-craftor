<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade;

use Generated\Shared\Transfer\LocaleTransfer;

class ProductGtinCraftorToLocaleFacadeBridge implements ProductGtinCraftorToLocaleFacadeInterface
{

    /**
     * @var \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected $localeFacade;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     */
    public function __construct($localeFacade)
    {
        $this->localeFacade = $localeFacade;
    }

    /**
     * @return LocaleTransfer
     */
    public function getCurrentLocale(): LocaleTransfer
    {
        return $this->localeFacade->getCurrentLocale();
    }

}