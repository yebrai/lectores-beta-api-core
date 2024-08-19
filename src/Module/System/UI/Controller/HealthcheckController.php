<?php

declare(strict_types=1);

namespace BetaReaders\Module\System\Infrastructure\UI\Controller;

use BetaReaders\Module\System\Application\Healthcheck\HealthcheckSystemQuery;
use BetaReaders\Shared\Domain\Bus\Query\QueryBus;
use BetaReaders\Shared\Infrastructure\Response\JsonApi\JsonApiCreatedResponse;

final class HealthcheckController
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function healthcheck(): JsonApiCreatedResponse
    {
        $query = new HealthcheckSystemQuery();
        $response = $this->queryBus->ask($query);

        return new JsonApiCreatedResponse($response);
    }
}