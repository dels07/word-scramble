<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <title>Word Scramble</title>
</head>
<body>
    <div class="box-logo">
        <button><span>w</span></button>
        <button><span>o</span></button>
        <button><span>r</span></button>
        <button><span>d</span></button>
        <br>
        <button class="btn-small"><span>s</span></button><button class="btn-small"><span>c</span></button><button class="btn-small"><span>r</span></button><button class="btn-small"><span>a</span></button><button class="btn-small"><span>m</span></button><button class="btn-small"><span>b</span></button><button class="btn-small"><span>l</span></button><button class="btn-small"><span>e</span></button>
    </div>
    <div class="box-form">
        @if (! empty(session('message')))
            <span class="notification {{ session('type') }}" style="width: 240px; top: -48px;">{{ session('message') }}</span>
        @endif
        <form action="{{ route('auth.postLogin') }}" method="POST">
            @csrf
            <input type="text" name="email" placeholder="email" value="{{ old('email', 'user@demo.com') }}"><br>
            <input type="password" name="password" placeholder="password"><br>
            <button type="submit" class="btn-auth"><span>Lets Play</span></button>
        </form>
        <a href="{{ route('auth.register') }}">Register</a>
    </div>
</body>
</html>