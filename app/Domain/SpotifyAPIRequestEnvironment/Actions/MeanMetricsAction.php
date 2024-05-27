<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Actions;

use App\Domain\SpotifyAPIRequestEnvironment\Models\Parameters;

class MeanMetricsAction
{
    public static function Execute(array $metrics): Parameters
    {
        $params = [];
        foreach ($metrics as $list) {
            foreach ($list as $key => $value) {
                if (!isset($params[$key])) {
                    $params[$key] = $key == "seed_tracks" ? "" : 0;
                }
                if ($key == "seed_tracks") {
                    $params[$key] .= $params[$key] == "" ? $value : "%" . $value;
                } else {
                    $params[$key] += $value;
                }
            }
        }

        $count = count($metrics);
        foreach ($params as $key => $value) {
            if ($key != "seed_tracks") {
                $params[$key] = $value / $count;
            }
        }
        $parameters = new Parameters();
        $parameters->params = $params;

        return $parameters;
    }
}