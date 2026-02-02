@extends('Master_page')

@section('title', 'Connexion')

@section('content')
<style>
    .auth-container {
        background: #ffffff;
        padding: 50px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        max-width: 450px;
        margin: 0 auto;
    }

    .auth-container h1 {
        font-size: 32px;
        margin-bottom: 30px;
        color: #001f3f;
        text-align: center;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #001f3f;
        font-weight: 500;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e6ed;
        border-radius: 6px;
        font-size: 1rem;
        font-family: inherit;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #001f3f;
        box-shadow: 0 0 0 3px rgba(0, 31, 63, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }

    .form-check {
        margin-bottom: 20px;
    }

    .form-check-input {
        margin-right: 8px;
        cursor: pointer;
    }

    .form-check-label {
        color: #555;
        font-size: 14px;
        cursor: pointer;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        align-items: center;
    }

    .btn-submit {
        flex: 1;
        background-color: #001f3f;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
        font-size: 16px;
    }

    .btn-submit:hover {
        background-color: #003d66;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 31, 63, 0.3);
    }

    .forgot-password {
        color: #001f3f;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
    }

    .forgot-password:hover {
        text-decoration: underline;
        color: #7a8fa0;
    }

    .register-link {
        text-align: center;
        margin-top: 30px;
        color: #555;
        font-size: 14px;
    }

    .register-link a {
        color: #001f3f;
        text-decoration: none;
        font-weight: 600;
    }

    .register-link a:hover {
        text-decoration: underline;
        color: #7a8fa0;
    }
</style>

<div class="auth-container">
    <h1>🔐 Connexion</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">{{ __('Adresse Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Mot de Passe') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Se Souvenir de Moi') }}
            </label>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">{{ __('Connexion') }}</button>
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">{{ __('Mot de passe oublié?') }}</a>
            @endif
        </div>
    </form>

    <div class="register-link">
        Pas encore inscrit? <a href="{{ route('register') }}">Créer un compte</a>
    </div>
</div>
@endsection
