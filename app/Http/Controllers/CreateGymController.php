<?php

namespace App\Http\Controllers;

use App\Actions\Admin\InitGym;
use App\DTO\GymCreateData;
use App\Http\Requests\StoreGymRequest;
use App\Http\Resources\GymResource;


class CreateGymController extends Controller
{
    public function __invoke(StoreGymRequest $request)
    {
        $gym = InitGym::run(GymCreateData::fromRequest($request));
        return $this->resourceCreated(GymResource::make($gym));
    }
}
