<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrant;
use App\Models\Mechanic;
use App\Models\Promotion;
use App\Http\Requests\CreateEntrantRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\WinnerMail;

class EntrantController extends Controller
{
    public function store(Client $client, Mechanic $mechanic, CreateEntrantRequest $request)
    {
        $promotion = $client->latestPromotion;

        if ($promotion->mechanic_id != $mechanic) {
            return response()->json([
                'message' => 'Mechanic is not valid.'
            ], 500, $headers);
        }

        $data = $request->validated();

        $data['winner'] = Promotion::getWinner($mechanic->name, $promotion);

        $entrant = Entrant::create($data);

        if ($data['winner']) {
            Mail::to($data['entry']['email'])->send(new WinnerMail($client, $data['entry']));       
        }

        return response()->json([
            'message' => 'Successfully entered promotion.',
            'data' => $data['entry']
        ], 200);
    }
}
