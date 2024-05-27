<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Actions;

class RecommendationsCompressViewAction
{
    public static function Execute(array $recommendations): array
    {
        $final_result = array();
        foreach ($recommendations['tracks'] as $track) {
            $final_result[] = [
                "name" => $track['name'],
                "artists" => $track['artists'][0]['name'],
                "album" => $track['album']['name'],
                "release_date" => $track['album']['release_date']
            ];
        }
        return $final_result;
    }
}