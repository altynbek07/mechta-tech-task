<?php

namespace vBulletin\Search\DTO;

class SearchRequestDTO
{
    private ?int $searchId;
    private ?string $query;

    public function __construct(array $requestData)
    {
        $this->searchId = isset($requestData['searchid']) ? (int)$requestData['searchid'] : null;
        $this->query = $requestData['q'] ?? null;
    }

    public function getSearchId(): ?int
    {
        return $this->searchId;
    }

    public function getQuery(): ?string
    {
        return $this->query;
    }
}
