<?php

namespace vBulletin\Search;

class SearchRepository
{
    public function __construct(private \PDO $db)
    {
    }

    public function getResultsByQuery(string $query): array
    {
        $sth = $this->db->prepare('SELECT * FROM vb_post WHERE text LIKE :query');
        $sth->execute([':query' => '%' . $query . '%']);
        return $sth->fetchAll();
    }

    public function getResultsBySearchId(int $searchId): array
    {
        $sth = $this->db->prepare('SELECT * FROM vb_searchresult WHERE searchid = :searchid');
        $sth->execute([':searchid' => $searchId]);
        return $sth->fetchAll();
    }
}
