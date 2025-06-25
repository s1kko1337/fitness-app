<?php

namespace App\Actions;
use App\Mail\GymOwnerWelcome;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
final class MailToGymOwner
{
    use AsAction;

    public static function handle(User $user, $password)
    {
        Mail::to($user->email)->send(new GymOwnerWelcome($user->email, $password));
    }
}
