<?php

namespace App\Actions\Trainers;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

final class ListTrainers
{
    use AsAction;

    public static function handle()
    {
        return Auth::user()->trainers()->get();
    }
}
