@extends('auth.common')

@section('centered_content')

    <div class="pb-4 text-center"><h1>{{ __('Register') }}</h1></div>

    <div class="rounded bg-white border-grey-dark p-4 mb-4">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">


                <input id="name" type="text" placeholder="Name" class="w-full p-4 border rounded{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="mb-4">
                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="w-full p-4 border rounded{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="mb-4">
                <input id="password" type="password" placeholder="{{ __('Password') }}" class="w-full p-4 border rounded{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="mb-4">
                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="w-full p-4 border rounded" name="password_confirmation" required>
            </div>

            <button type="submit" class="button w-full p-4 bg-green border-green-dark rounded text-white">
                {{ __('Register') }}
            </button>

        </form>

    </div>
@endsection
