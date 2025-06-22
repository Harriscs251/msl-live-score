@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #f9d423, #ff4e50); /* Yellow to warm red gradient */
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .register-container {
        background: rgba(0, 33, 71, 0.9); /* Dark blue with opacity */
        padding: 40px;
        border-radius: 20px;
        width: 100%;
        max-width: 450px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        color: #ffffff;
    }

    .register-container h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 700;
        color: #f9d423;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 10px;
        border: none;
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    .form-control::placeholder {
        color: #ddd;
    }

    .btn-register {
        width: 100%;
        padding: 12px;
        background: #f9d423;
        border: none;
        color: #000;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .btn-register:hover {
        background: #ffe600;
    }

</style>

<div class="register-container">
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text"
                class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                placeholder="Your full name">

            @error('name')
                <span class="invalid-feedback" role="alert" style="color: #ffdddd;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" required autocomplete="email"
                placeholder="you@example.com">

            @error('email')
                <span class="invalid-feedback" role="alert" style="color: #ffdddd;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password"
                placeholder="Minimum 8 characters">

            @error('password')
                <span class="invalid-feedback" role="alert" style="color: #ffdddd;">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password"
                class="form-control" name="password_confirmation" required autocomplete="new-password"
                placeholder="Re-enter password">
        </div>

        <button type="submit" class="btn-register">Register</button>
    </form>
</div>
@endsection
