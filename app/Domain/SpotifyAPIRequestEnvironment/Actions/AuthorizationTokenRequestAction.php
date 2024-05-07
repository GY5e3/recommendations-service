<?php

namespace App\Domain\SpotifyAPIRequestEnvironment\Actions;

class AuthorizationTokenRequestAction
{
    public static function execute()
    {
        //TODO: Вынести client_id и client_secret в .env
        //TODO: асинхронная проверка токена(?)
        $token_url = 'https://accounts.spotify.com/api/token';
        $client_id = '5cc4d04a1158418b94473706236ad563';
        $client_secret = '7af803ec51574e66ab8d84b917ba65e0';

        // Параметры запроса
        $params = array(
            'grant_type' => 'client_credentials',
            'client_id' => $client_id,
            'client_secret' => $client_secret
        );

        // Инициализация cURL-сессии
        $ch = curl_init();

        // Установка опций cURL
        curl_setopt($ch, CURLOPT_URL, $token_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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

        // Вывод результата
        // var_dump($result);

        return $result["access_token"];
    }
}