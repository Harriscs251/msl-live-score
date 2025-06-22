@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #f9d423, #ff4e50);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        background: #002147;
        padding: 50px 60px;
        border-radius: 20px;
        width: 100%;
        max-width: 600px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        color: #ffffff;
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 35px;
        font-size: 36px;
        font-weight: 800;
        color: #f9d423;
    }

    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 14px 18px;
        margin-bottom: 20px;
        font-size: 16px;
        border-radius: 10px;
        border: none;
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    .form-control::placeholder {
        color: #ddd;
    }

    .form-check {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        font-size: 16px;
    }

    .form-check-input {
        margin-right: 10px;
        width: 18px;
        height: 18px;
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 10px;
    }

    .btn-login,
    .btn-register {
        flex: 1;
        padding: 14px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .btn-login {
        background: #f9d423;
        color: #000;
    }

    .btn-login:hover {
        background: #ffe600;
    }

    .btn-register {
        background: transparent;
        border: 2px solid #f9d423;
        color: #f9d423;
    }

    .btn-register:hover {
        background: #f9d423;
        color: #000;
    }

    .admin-login {
        margin-top: 25px;
        text-align: center;
    }

    .admin-login a {
        background: #fff;
        color: #002147;
        padding: 12px 28px;
        border-radius: 8px;
        font-size: 16px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
    }

    .admin-login a:hover {
        background: #ffe600;
    }

    .forgot-link {
        text-align: center;
        margin-top: 20px;
    }

    .forgot-link a {
        color: #ffffff;
        text-decoration: underline;
        font-size: 16px;
    }

    @media (max-width: 768px) {
        .login-container {
            padding: 40px 25px;
        }

        .btn-group {
            flex-direction: column;
        }
    }
</style>

<div class="login-container">
    <h2>User Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" class="form-control" name="email" required placeholder="you@example.com" autofocus>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" required placeholder="••••••••">
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn-login">Login</button>
            <a href="{{ route('register') }}" class="btn-register text-center">Register</a>
        </div>

        <div class="admin-login">
            <a href="{{ route('admin.login') }}">Admin Login</a>
        </div>

        <div class="forgot-link">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot Your Password?</a>
            @endif
        </div>
    </form>
</div>
@endsection
