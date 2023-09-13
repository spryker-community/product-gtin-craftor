<?php

use Spryker\Shared\ErrorHandler\ErrorHandler;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\Kernel\KernelConstants;

const APPLICATION_STORE = 'DE';
$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED;
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'SprykerDev',
    'SprykerCommunity',
];
$config[KernelConstants::CORE_NAMESPACES] = [
    'SprykerShop',
    'SprykerEco',
    'Spryker',
    'SprykerSdk',
];