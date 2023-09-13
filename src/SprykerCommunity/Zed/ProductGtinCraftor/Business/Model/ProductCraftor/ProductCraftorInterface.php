<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor\Business\Model\ProductCraftor;

interface ProductCraftorInterface
{

    public function craftProduct(string $gtin, string $productAbstractSku, ?int $price = 1);

}