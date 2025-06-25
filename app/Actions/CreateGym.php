<?php

namespace App\Actions;
use App\Models\Gym;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
final class CreateGym
{
    use AsAction;

    public static function handle(array $request) : Gym
    {
        return Gym::create($request);
    }
}
