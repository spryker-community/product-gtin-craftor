<?php

declare(strict_types=1);

namespace SprykerCommunity\Client\UpcDatabase\Mapper;

use Generated\Shared\Transfer\UpcResponseTransfer;

interface UpcDatabaseResponseMapperInterface
{
    /**
     * @param array<string> $upcDatabaseResponse
     *
     * @return \Generated\Shared\Transfer\UpcResponseTransfer
     */
    public function mapUpcDatabaseResponseToUpcResponseTransfer(array $upcDatabaseResponse): UpcResponseTransfer;
}
