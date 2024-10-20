<?php

namespace vBulletin\Search\Renderer;

class HtmlRenderer implements RendererInterface
{
    const int EXCLUDE_FORUMID = 5;
  
    public function renderSearchResults(array $results): void
    {
        if (empty($results)) {
            echo "<p>No results found.</p>";
            return;
        }

        echo "<ul>";
        foreach($results as result) {
            if (result['forumid'] !== self::EXCLUDE_FORUMID) {
                echo "<li>";
                echo "<p>" . htmlspecialchars($result['text'] ?? "") . "</p>";
                echo "</li>";
            }
        }
        echo "</ul>";
    }

    public function renderSearchForm(): void
    {
        echo "<h2>Search in forum</h2><form><input name='q'></form>";
    }
}
