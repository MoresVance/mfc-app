<!-- modified version of travel booking login page, adapted for MFC Balloons & Party Needs  -->
<!-- retrieved from: https://github.com/puikinsh/login-forms/tree/main/forms/travel-booking  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MFC Sign Up</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <a href="index.php" class="back-btn" aria-label="Go back to home">
        <span aria-hidden="true">&#8592;</span>
    </a>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo"></div>
                <p>Sign up to start booking with MFC</p>
            </div>
            
            <form class="login-form" id="signupForm" novalidate>
                <div class="form-group">
                    <input type="text" id="fullName" name="fullName" required autocomplete="name" placeholder="Full name">
                    <label for="fullName">Full name</label>
                    <span class="error-message" id="fullNameError"></span>
                </div>

                <div class="form-group">
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="Email address">
                    <label for="email">Email address</label>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Create password">
                    <label for="password">Create password</label>
                    <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                        <svg class="eye-icon" width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M9 3C4.5 3 1.05 6.21 0.5 9c.55 2.79 4 6 8.5 6s7.95-3.21 8.5-6c-.55-2.79-4-6-8.5-6zm0 10a4 4 0 110-8 4 4 0 010 8zm0-6.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5z" fill="currentColor"/>
                        </svg>
                    </button>
                    <span class="error-message" id="passwordError"></span>
                </div>

                <div class="form-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" required autocomplete="new-password" placeholder="Confirm password">
                    <label for="confirmPassword">Confirm password</label>
                    <span class="error-message" id="confirmPasswordError"></span>
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

            <div class="divider">
                <span>or sign up with</span>
            </div>

            <div class="social-login">
                <button type="button" class="social-btn">
                    <svg width="20" height="20" viewBox="0 0 20 20">
                        <path fill="#4285F4" d="M18.12 8.89H10.22v2.22h4.54c-.2 1.11-.82 1.64-1.78 2.22v1.78h2.89c1.69-1.56 2.67-3.85 2.67-6.58 0-.58-.05-.71-.17-1.31l.05-.33z"/>
                        <path fill="#34A853" d="M10.22 18c2.4 0 4.41-.8 5.88-2.17l-2.89-1.78c-.8.56-1.82.89-2.99.89-2.3 0-4.25-1.55-4.94-3.64H2.17v1.83A8.22 8.22 0 0010.22 18z"/>
                        <path fill="#FBBC05" d="M5.28 11.3a4.9 4.9 0 010-3.14V6.33H2.17a8.22 8.22 0 000 7.8l3.11-2.83z"/>
                        <path fill="#EA4335" d="M10.22 3.58c1.46 0 2.78.5 3.82 1.5l2.83-2.83A8.22 8.22 0 002.17 6.33l3.11 2.83c.69-2.09 2.64-3.64 4.94-3.58z"/>
                    </svg>
                    Google
                </button>
                
                <button type="button" class="social-btn">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="#1877F2">
                        <path d="M20 10.04C20 4.5 15.52.02 10 .02S0 4.5 0 10.04c0 5.01 3.66 9.17 8.44 9.9v-7h-2.54v-2.9h2.54V7.85c0-2.51 1.49-3.89 3.78-3.89 1.09 0 2.23.19 2.23.19v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.9h-2.34v7C16.34 19.21 20 15.05 20 10.04z"/>
                    </svg>
                    Facebook
                </button>
            </div>

            <div class="signup-link">
                <p>Already have an account? <a href="login.php">Sign in</a></p>
            </div>

            <div class="success-message" id="successMessage">
                <div class="success-icon">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <circle cx="16" cy="16" r="16" fill="#c0392b"/>
                        <path d="M11 16l4 4 8-8" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3>Account created!</h3>
            </div>
        </div>
    </div>

</body>
</html>