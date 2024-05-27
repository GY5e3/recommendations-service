<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Models;

class Parameters
{
    public array $params = [];

    public function getLimit(): int
    {
        return $this->limit;
    }
    private int $limit = 10;

}
