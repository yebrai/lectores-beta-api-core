<?php

declare(strict_types=1);

namespace BetaReaders\Module\System\Application\Healthcheck;

use BetaReaders\Shared\Domain\Bus\Query\Query;
use BetaReaders\Shared\Domain\Uid\UlidProvider;

final class HealthcheckSystemQueryHandler implements Query
{
    private UlidProvider $ulidProvider;

    public function __construct(UlidProvider $ulidProvider)
    {
        $this->ulidProvider = $ulidProvider;
    }

    public function __invoke(HealthcheckSystemQuery $query): array
    {
        return [
            'data' => [
                'id' => $this->ulidProvider->new(),
                'type' => 'healthcheck',
                'attributes' => [
                    'result' => true,
                ],
            ],
        ];
    }
}