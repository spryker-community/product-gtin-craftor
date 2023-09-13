<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade;

use Generated\Shared\Transfer\LocaleTransfer;

interface ProductGtinCraftorToLocaleFacadeInterface
{

    /**
     * @return LocaleTransfer
     */
    public function getCurrentLocale(): LocaleTransfer;

}