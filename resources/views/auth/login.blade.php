@extends('auth.common')

@section('centered_content')

    <div class="pb-4 text-center"><h1>{{ __('Login') }}</h1></div>

    <div class="rounded bg-white border-grey-dark p-4 mb-4">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <input id="email" type="email" placeholder="Email" class="w-full p-4 border rounded{{$errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div>
                <input id="password" type="password" placeholder="Password" class="w-full p-4 border rounded{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
                @endif
            </div>

            <div class="my-4">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                </label>
            </div>

            <div>
                <button type="submit" class="button w-full p-4 bg-green border-green-dark rounded text-white">
                    {{ __('Login') }}
                </button>
            </div>
        </form>

    </div>

    <div class="rounded bg-white border-grey-dark p-4">
        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </div>

@endsection
