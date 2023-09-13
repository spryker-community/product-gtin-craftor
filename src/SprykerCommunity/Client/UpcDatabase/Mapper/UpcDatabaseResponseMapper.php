<?php

declare(strict_types=1);

namespace SprykerCommunity\Client\UpcDatabase\Mapper;

use Generated\Shared\Transfer\UpcResponseTransfer;

class UpcDatabaseResponseMapper implements UpcDatabaseResponseMapperInterface
{
    /**
     * @param array<string> $upcDatabaseResponse
     *
     * @return \Generated\Shared\Transfer\UpcResponseTransfer
     */
    public function mapUpcDatabaseResponseToUpcResponseTransfer(array $upcDatabaseResponse): UpcResponseTransfer
    {
        $upcResponseTransfer = new UpcResponseTransfer();
        $upcResponseTransfer->fromArray($upcDatabaseResponse, true);

        return $upcResponseTransfer;
    }
}
