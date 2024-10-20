<?php

namespace vBulletin\Search;

interface SearchRepositoryInterface
{
    public function getResultsByQuery(string $query): array

    public function getResultsBySearchId(int $searchId): array
}
