<?php

namespace App\Actions\Admin;
use App\DTO\GymCreateData;
use App\Models\Gym;
use Lorisleiva\Actions\Concerns\AsAction;

final class CreateGym
{
    use AsAction;

    public static function handle(GymCreateData $data) : Gym
    {
        return Gym::create($data->toArray());
    }
}
