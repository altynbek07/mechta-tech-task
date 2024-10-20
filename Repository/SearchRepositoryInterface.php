<?php

namespace vBulletin\Search\Repository;

interface SearchRepositoryInterface
{
    public function getResultsByQuery(string $query): array;

    public function getResultsBySearchId(int $searchId): array;
}
