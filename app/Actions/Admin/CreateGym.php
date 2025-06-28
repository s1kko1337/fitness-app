<?php

namespace App\Actions\Admin;
use App\Models\Gym;
use Lorisleiva\Actions\Concerns\AsAction;

final class CreateGym
{
    use AsAction;

    public static function handle(array $request) : Gym
    {
        return Gym::create($request);
    }
}
