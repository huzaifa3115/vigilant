@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="form-signin auth-form" method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="checkbox mb-3 text-center">
                <label>
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <a href="{{ route('register') }}"><button class="btn btn-lg btn-primary btn-block mt-3" type="button">Register</button></a>
            </form>
        </div>
    </div>
@endsection
