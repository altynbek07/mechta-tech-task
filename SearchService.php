<?php

namespace vBulletin\Search;

use Psr\Log\LoggerInterface;
use vBulletin\Search\Repository\SearchRepositoryInterface;
use vBulletin\Search\Renderer\RendererInterface;

class SearchService
{
    public function __construct(
        private SearchRepositoryInterface $searchRepository,
        private LoggerInterface $logger,
        private RendererInterface $renderer
    ) {
    }

    public function handleSearch(SearchRequestDTO $request): void
    {
        if ($request->getSearchId()) {
            $results = $this->searchRepository->getResultsBySearchId($request->getSearchId());
        } elseif ($request->getQuery()) {
            $results = $this->searchRepository->getResultsByQuery($request->getQuery());
            $this->logger->info('Search query: ' . $request->getQuery());
        } else {
            $this->renderer->renderSearchForm();
            return;
        }

        $this->renderer->renderSearchResults($results);
    }
}
