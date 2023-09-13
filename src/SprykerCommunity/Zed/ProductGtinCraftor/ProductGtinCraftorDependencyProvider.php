<?php

namespace SprykerCommunity\Zed\ProductGtinCraftor;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Client\ProductGtinCraftorToUpcDatabaseClientBridge;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Client\ProductGtinCraftorToUpcDatabaseClientInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeBridge;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToLocaleFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToOpenAiFacadeBridge;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToOpenAiFacadeInterface;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToProductFacadeBridge;
use SprykerCommunity\Zed\ProductGtinCraftor\Dependency\Facade\ProductGtinCraftorToProductFacadeBridgeInterface;

class ProductGtinCraftorDependencyProvider extends AbstractBundleDependencyProvider
{
    const FACADE_OPEN_AI = 'FACADE_OPEN_AI';
    const FACADE_LOCALE = 'FACADE_LOCALE';
    const CLIENT_UPC_DATABASE = 'CLIENT_UPC_DATABASE';
    const FACADE_PRODUCT = 'FACADE_PRODUCT';

    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $this->addOpenAiFacade($container);
        $this->addLocaleFacade($container);
        $this->addUpcDatabaseClient($container);
        $this->addProductFacade($container);

        return $container;
    }

    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container= parent::provideCommunicationLayerDependencies($container);
        $this->addProductFacade($container);

        return $container;
    }

    /**
     * @param Container $container
     */
    protected function addOpenAiFacade(Container $container)
    {
        $container->set(static::FACADE_OPEN_AI, function (Container $container): ProductGtinCraftorToOpenAiFacadeInterface {
            return new ProductGtinCraftorToOpenAiFacadeBridge($container->getLocator()->openAi()->facade());
        });
    }

    /**
     * @param Container $container
     */
    protected function addLocaleFacade(Container $container)
    {
        $container->set(static::FACADE_LOCALE, function (Container $container): ProductGtinCraftorToLocaleFacadeInterface {
            return new ProductGtinCraftorToLocaleFacadeBridge($container->getLocator()->locale()->facade());
        });
    }

    /**
     * @param Container $container
     */
    protected function addUpcDatabaseClient(Container $container)
    {
        $container->set(static::CLIENT_UPC_DATABASE, function (Container $container): ProductGtinCraftorToUpcDatabaseClientInterface {
            return new ProductGtinCraftorToUpcDatabaseClientBridge($container->getLocator()->upcDatabase()->client());
        });
    }

    protected function addProductFacade(Container $container): Container
    {
        $container->set(static::FACADE_PRODUCT, function (Container $container): ProductGtinCraftorToProductFacadeBridgeInterface {
            return new ProductGtinCraftorToProductFacadeBridge($container->getLocator()->product()->facade());
        });

        return $container;
    }
}
