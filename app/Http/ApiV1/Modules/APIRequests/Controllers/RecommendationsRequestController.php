<?php

namespace App\Http\ApiV1\Modules\APIRequests\Controllers;

use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class RecommendationsRequestController extends Controller
{
    public function get(Request $request)
    {

    }
    /*
     * TODO:
     * Написать класс Params, который будет хранить в себе метрики для генерации рекомендаций
     * Здесь, в контроллере, будет создаваться объект Params и передаваться в RecommendationsRequestAction->execute(...)
     * */
}