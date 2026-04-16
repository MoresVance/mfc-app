@extends('layouts.app', ['title' => 'MFC Login', 'showShell' => false])

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
                <p>Sign in to continue booking with MFC</p>
            </div>

            <form class="login-form" id="loginForm" novalidate>
                <div class="form-group">
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="Email address">
                    <label for="email">Email address</label>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                    <label for="password">Password</label>
                    <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                        <svg class="eye-icon" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M9 3C4.5 3 1.05 6.21 0.5 9c.55 2.79 4 6 8.5 6s7.95-3.21 8.5-6c-.55-2.79-4-6-8.5-6zm0 10a4 4 0 110-8 4 4 0 010 8zm0-6.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5z" fill="currentColor"/>
                        </svg>
                    </button>
                    <span class="error-message" id="passwordError"></span>
                </div>

                <div class="form-options">
                    <label class="checkbox-wrapper">
                        <input type="checkbox" id="remember" name="remember">
                        <span class="checkmark">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <path d="M2 6l2.5 2.5L10 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        Keep me signed in
                    </label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>

                <button type="submit" class="login-btn">
                    <span class="btn-text">Sign In</span>
                    <div class="btn-loader">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <circle cx="10" cy="10" r="8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-dasharray="32" stroke-dashoffset="32">
                                <animate attributeName="stroke-dashoffset" dur="1s" values="32;0" repeatCount="indefinite"/>
                            </circle>
                        </svg>
                    </div>
                </button>
            </form>

            <div class="divider">
                <span>or sign in with</span>
            </div>

            <div class="social-login">
                <button type="button" class="social-btn">Google</button>
                <button type="button" class="social-btn">Facebook</button>
            </div>

            <div class="signup-link">
                <p>New to MFC? <a href="{{ route('signup') }}">Create an account</a></p>
            </div>

            <div class="success-message" id="successMessage">
                <div class="success-icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <circle cx="16" cy="16" r="16" fill="#c0392b"/>
                        <path d="M11 16l4 4 8-8" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3>Welcome back!</h3>
            </div>
        </div>
    </div>
@endsection
