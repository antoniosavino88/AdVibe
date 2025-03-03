{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdVibe -Mail</title>
</head>
<body>
    <div>
        <h1>Un utente ha chiesto di lavorare con noi</h1>
        <h2>Ecco i suoi dati:</h2>
        <p>Nome: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Se vuoi renderl* revisor, clicca qui:</p>
        <a href="{{ route('make.revisor', compact('user'))}}">Rendi Revisor</a>
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('ui.adVibe') }} - {{ __('ui.mail') }}</title>
</head>

<body>
    <div>
        <h1>{{ __('ui.userRequestedToWork') }}</h1>
        <h2>{{ __('ui.userData') }}:</h2>
        <p>{{ __('ui.name') }}: {{ $user->name }}</p>
        <p>{{ __('ui.email') }}: {{ $user->email }}</p>
        <p>{{ __('ui.makeRevisorMessage') }}:</p>
        <a href="{{ route('make.revisor', compact('user')) }}">{{ __('ui.makeRevisor') }}</a>
    </div>
</body>

</html>
