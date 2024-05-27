<?php

namespace App\Http\ApiV1\Modules\APIRequests\Controllers;

use App\Domain\SpotifyAPIRequestEnvironment\Actions\MeanMetricsAction;
use App\Domain\SpotifyAPIRequestEnvironment\Actions\RecommendationsRequestAction;
use App\Domain\SpotifyAPIRequestEnvironment\Models\Parameters;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class RecommendationsRequestController extends Controller
{
    public function get(Request $request)
    {
        try {
            $paramsAndTracks = json_decode($request->getContent(), true);
            $parameters = MeanMetricsAction::execute($paramsAndTracks);
            return response()->json(RecommendationsRequestAction::execute($parameters)); // Возвращаем только параметры
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}

/*
     * TODO:
     * Написать класс Params, который будет хранить в себе метрики для генерации рекомендаций
     * Здесь, в контроллере, будет создаваться объект Params и передаваться в RecommendationsRequestAction->execute(...)
     *
     *[]
     * [{"key1":"value1","key2":"value2"},{"key1":"value3","key2":"value4"},{"key1":"value5","key2":"value6"}]

     * */