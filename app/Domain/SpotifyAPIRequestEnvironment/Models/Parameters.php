<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Models;

class Parameters
{
    public array $params = [];

    public function toArray(): array
    {
        return $this->params;
    }
    public function getLimit(): int
    {
        return $this->limit;
    }
    private int $limit = 10;

}


//[{"seed_tracks":"0UnaXB4f6g7nQmMdQlBS5h", "target_danceability":0.401, "target_energy":0.858, "target_speechiness":0.156, "target_tempo":125.866, "target_valence":0.263}]