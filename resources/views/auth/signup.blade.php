@extends('layouts.app', ['title' => 'MFC Sign Up', 'showShell' => false])

@push('styles')
    <link rel="stylesheet" href="/assets/css/login.css">
@endpush

@section('content')
    <a href="{{ route('home') }}" class="back-btn" aria-label="Go back to home">
        <span aria-hidden="true">&#8592;</span>
    </a>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo"></div>
                <p>Sign up to start booking with MFC</p>
            </div>

            <form class="login-form" id="signupForm" method="POST" action="{{ route('signup.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full name">
                    <label for="name">Full name</label>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email address">
                    <label for="email">Email address</label>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Create password">
                    <label for="password">Create password</label>
                    <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                        <svg class="eye-icon" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M9 3C4.5 3 1.05 6.21 0.5 9c.55 2.79 4 6 8.5 6s7.95-3.21 8.5-6c-.55-2.79-4-6-8.5-6zm0 10a4 4 0 110-8 4 4 0 010 8zm0-6.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5z" fill="currentColor"/>
                        </svg>
                    </button>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                    <label for="password_confirmation">Confirm password</label>
                    @error('password_confirmation')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="login-btn">
                    <span class="btn-text">Create account</span>
                    <div class="btn-loader">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <circle cx="10" cy="10" r="8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-dasharray="32" stroke-dashoffset="32">
                                <animate attributeName="stroke-dashoffset" dur="1s" values="32;0" repeatCount="indefinite"/>
                            </circle>
                        </svg>
                    </div>
                </button>
            </form>

            <div class="signup-link">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </div>
    </div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signupForm');
    const toggle = document.getElementById('passwordToggle');
    const password = document.getElementById('password');
    const confirmation = document.getElementById('password_confirmation');

    if (toggle && password) {
        toggle.addEventListener('click', () => {
            const nextType = password.type === 'password' ? 'text' : 'password';
            password.type = nextType;
            if (confirmation) {
                confirmation.type = nextType;
            }
        });
    }

    if (form) {
        form.addEventListener('submit', () => {
            const button = form.querySelector('.login-btn');
            if (button) button.classList.add('loading');
        });
    }
});
</script>
@endpush
@endsection
