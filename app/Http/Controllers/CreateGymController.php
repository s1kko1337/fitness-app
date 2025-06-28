<?php

namespace App\Http\Controllers;

use App\Actions\Admin\InitGym;
use App\Http\Requests\StoreGymRequest;
use App\Http\Resources\GymResource;


class CreateGymController extends Controller
{
    public function __invoke(StoreGymRequest $request)
    {
        $gym = InitGym::run($request->validated());
        return $this->resourceCreated(GymResource::make($gym));
    }
}
