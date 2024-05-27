<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Actions;

use App\Domain\SpotifyAPIRequestEnvironment\Models\Parameters;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class RecommendationsRequestAction
{
    public static function Execute(Parameters $parameters)
    {
        $client = new Client();

        $api_url = 'https://api.spotify.com/v1/recommendations?limit=' . $parameters->getLimit();
        foreach ($parameters->params as $key => $value) {
            $api_url .= '&' . $key . '=' . $value;
        }
        $access_token = AuthorizationTokenRequestAction::execute();

        try {
            $response = $client->request('GET', $api_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $access_token,
                ],
            ]);

            return json_decode($response->getBody(), true);

        }
        catch (GuzzleException $e) {
            echo 'Ошибка при отправке запроса: ' . $e->getMessage();
            return null;
        }
    }
}