<?php

namespace App\DTO;

use App\Http\Requests\StoreGymRequest;
use App\Parents\ObjectData;

class GymCreateData extends ObjectData
{
    public string $name;
    public string $address;
    public string $phone;
    public string $email;


    public static function fromRequest(StoreGymRequest $request): GymCreateData
    {
        return new GymCreateData(
            name: $request->get('name'),
            address: $request->get('address'),
            phone: $request->get('phone'),
            email: $request->get('email'),
        );
    }
}
