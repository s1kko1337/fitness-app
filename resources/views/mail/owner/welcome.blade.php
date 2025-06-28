@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    # Добро пожаловать в систему управления тренажерным залом!

    Ваш аккаунт владельца был успешно создан. Ниже вы найдете данные для входа в личный кабинет:

    Электронная почта: {{ $email }}
    Пароль: {{ $password }}

    @component('mail::button', ['url' => $loginUrl, 'color' => 'primary'])
        Перейти в личный кабинет
    @endcomponent

@endcomponent
