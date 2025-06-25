<?php

namespace App\Http\Controllers;

use App\Actions\InitGym;
use App\Http\Requests\StoreGymRequest;
use Symfony\Component\HttpFoundation\Response;


class CreateGymController extends Controller
{
    public function __invoke(StoreGymRequest $request)
    {
        try {
           InitGym::run($request->validated());
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gym creation failed',
                'error' => $e->getMessage()
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'gym has been created. invite sent.',
        ], Response::HTTP_OK);

    }
}
