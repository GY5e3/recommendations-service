<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Actions;

use Dotenv\Dotenv;
class AuthorizationTokenRequestAction
{
    public static function execute()
    {
        //TODO: Вынести client_id и client_secret в .env
        //TODO: асинхронная проверка токена(?)
        $token_url = 'https://accounts.spotify.com/api/token';
        $client_id = config('app.client_id');
        $client_secret = config('app.client_secret');

        // Параметры запроса
        $params = array(
            'grant_type' => 'client_credentials',
            'client_id' => $client_id,
            'client_secret' => $client_secret
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $token_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        if ($response === FALSE) {
            die('Ошибка при отправке запроса.');
        }

        // Обработка данных ответа (например, преобразование JSON в массив)
        $result = json_decode($response, true);

        // Вывод результата
        // var_dump($result);

        return $result["access_token"];
    }
}