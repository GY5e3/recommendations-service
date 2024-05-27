<?php

namespace App\Http\ApiV1\Modules\APIRequests\Controllers;

use App\Domain\SpotifyAPIRequestEnvironment\Actions\MeanMetricsAction;
use App\Domain\SpotifyAPIRequestEnvironment\Actions\RecommendationsCompressViewAction;
use App\Domain\SpotifyAPIRequestEnvironment\Actions\RecommendationsRequestAction;
use App\Domain\SpotifyAPIRequestEnvironment\Models\Parameters;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class RecommendationsRequestController extends Controller
{
    public function post(Request $request): JsonResponse
    {
        try {
            $tracksAndMetrics = json_decode($request->getContent(), true);

            $meanMetrics = MeanMetricsAction::Execute($tracksAndMetrics);

            $recommendations = RecommendationsRequestAction::Execute($meanMetrics);

            return response()->json(RecommendationsCompressViewAction::Execute($recommendations));

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
