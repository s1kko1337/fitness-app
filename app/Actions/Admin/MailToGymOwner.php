<?php

namespace App\Actions\Admin;
use App\DTO\UserData;
use App\Mail\GymOwnerWelcome;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

final class MailToGymOwner
{
    use AsAction;

    public static function handle(UserData $userData): void
    {
        Mail::to($userData->email)->send(new GymOwnerWelcome($userData->email, $userData->password));
    }
}
