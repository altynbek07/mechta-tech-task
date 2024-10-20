<?php

namespace vBulletin\Search;

use Psr\Log\LoggerInterface;

class SearchService
{
    public function __construct(
        private SearchRepository $searchRepository,
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
