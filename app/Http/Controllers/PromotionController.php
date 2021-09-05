<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Promotion;
use App\Http\Requests\CreatePromotionRequest;

class PromotionController extends Controller
{
    public function store(CreatePromotionRequest $request)
    {
        $data = $request->validated();

        $promotion = Promotion::create($data);

        return response()->json([
            'message' => 'Successfully created promotion.',
            'data' => $promotion
        ], 200);
    }

    public function show(Client $client)
    {
        $promotion = $client->latestPromotion;

        return response()->json([
            'data' => $promotion
        ], 200);
    }
}
