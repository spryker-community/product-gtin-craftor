<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeBridge;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToOpenAiFacadeBridge;

class ProductGtinCraftorDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_OPEN_AI = 'FACADE_OPEN_AI';
    const FACADE_LOCALE = 'FACADE_LOCALE';

    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $this->addOpenAiFacade($container);
        $this->addLocaleFacade($container);

        return $container;
    }

    protected function addOpenAiFacade(Container $container)
    {
        $container->set(static::FACADE_OPEN_AI, function (Container $container) {
            return new ProductGtinCraftorToOpenAiFacadeBridge($container->getLocator()->openAi()->facade());
        });
    }

    protected function addLocaleFacade(Container $container)
    {
        $container->set(static::FACADE_LOCALE, function (Container $container) {
            return new ProductGtinCraftorToLocaleFacadeBridge($container->getLocator()->locale()->facade());
        });
    }

}