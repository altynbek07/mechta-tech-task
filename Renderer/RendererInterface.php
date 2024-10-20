<?php

namespace vBulletin\Search\Renderer;

interface RendererInterface
{
    public function renderSearchResults(array $results): void;

    public function renderSearchForm(): void;
}
