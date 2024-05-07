<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Models;

class Parameters
{
    public string $seed_tracks;
    public int $target_danceability;
    public int $target_energy;
    public int $target_speechiness;
    public int $target_tempo;
    public int $target_valence;
    public function getLimit(): int
    {
        return $this->limit;
    }
    private int $limit = 10;

}