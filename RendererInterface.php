<?php

namespace vBulletin\Search;

interface RendererInterface
{
    public function renderSearchResults(array $results): void;

    public function renderSearchForm(): void;
}
