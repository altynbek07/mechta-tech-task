<?php

namespace vBulletin\Search;

class HtmlRenderer implements RendererInterface
{
    const int EXCLUDE_FORUMID = 5;
  
    public function renderSearchResults(array $results): void
    {
        global $render; // TODO: Плохая практика использовать глобальные переменные
      
        foreach($results as $row) {
            if ($row['forumid'] !== self::EXCLUDE_FORUMID){
                $render->render_searh_result($row);
            }
        }
    }

    public function renderSearchForm(): void
    {
        echo "<h2>Search in forum</h2><form><input name='q'></form>";
    }
}
