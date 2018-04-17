@extends('auth.common')

@section('centered_content')
    <div class="pb-4 text-center"><h1>{{ __('Reset Password') }}</h1></div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="rounded bg-white border-grey-dark p-4 mb-4">

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="w-full p-4 border rounded{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <button type="submit" class="button w-full p-4 bg-green border-green-dark rounded text-white">
                {{ __('Send Password Reset Link') }}
            </button>

        </form>

    </div>
@endsection
