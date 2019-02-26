@extends('master')

@section('body')
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
        @if (! empty($errors))
            <span class="notification wrong" style="width: 240px; top: -48px;">{{ $errors->first() }}</span>
        @endif
        <form action="{{ route('auth.postRegister') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="your name" value="{{ old('name') }}"><br>
            <input type="text" name="email" placeholder="valid email address" value="{{ old('email') }}"><br>
            <input type="password" name="password" placeholder="password, min 6 chars"><br>
            <button type="submit" class="btn-auth"><span>Register</span></button>
        </form>
        <a href="{{ route('auth.login') }}">Already have account</a>
    </div>
@endsection