<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Actions;

use App\Domain\SpotifyAPIRequestEnvironment\Models\Parameters;
use Exception;
use GuzzleHttp\Client;

class RecommendationsRequestAction
{
    public static function execute(Parameters $parameters)
    {

            /*
             *         $api_url = 'https://api.spotify.com/v1/recommendations?limit=10&seed_tracks=0UnaXB4f6g7nQmMdQlBS5h&target_danceability=0.401&target_energy=0.858&target_speechiness=0.156&target_tempo=125.866&target_valence=0.263';
        $api_url = 'https://api.spotify.com/v1/recommendations?limit=' . $parameters->getLimit();
        foreach ($parameters->params as $key => $value) {
            $api_url .= '&' . $key . '=' . $value;
        }
        $access_token = AuthorizationTokenRequestAction::execute();

        // Инициализация cURL-сессии
        $ch = curl_init();

        // Установка опций cURL
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $access_token));

        // Выполнение запроса
        $response = curl_exec($ch);

        // Закрытие cURL-сессии
        curl_close($ch);

        // Обработка ответа
        if ($response === FALSE) {
            die('Ошибка при отправке запроса.');
        }

        // Обработка данных ответа (например, преобразование JSON в массив)
        $result = json_decode($response, true);

        return $result;
             * */

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
        catch (Exception $e) {
            echo 'Ошибка при отправке запроса: ' . $e->getMessage();
            return null;
        }
    }
}