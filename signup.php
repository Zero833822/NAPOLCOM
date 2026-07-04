<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EIMS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            background: #f4f6f9;
        }

        .signup-image {
            flex: 1;
            background: linear-gradient(rgba(32, 61, 87, 0.8), rgba(11, 79, 138, 0.8)),
                url('1977007.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 40px;
        }

        .signup-image-content {
            text-align: center;
            max-width: 400px;
        }

        .signup-image-content h1 {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .signup-image-content p {
            font-size: 18px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .signup-form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            max-height: 100vh;
            overflow-y: auto;
        }

        .signup-form {
            width: 100%;
            max-width: 420px;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .signup-form h2 {
            color: #0b4f8a;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .signup-form .subtitle {
            color: #666;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 16px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .form-group label .required {
            color: #e53935;
            margin-left: 2px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #0b4f8a;
            outline: none;
            box-shadow: 0 0 0 4px rgba(11, 79, 138, 0.1);
        }

        .form-group input.error {
            border-color: #e53935;
        }

        .form-group .error-message {
            color: #e53935;
            font-size: 12px;
            margin-top: 4px;
            display: none;
        }

        .form-group .error-message.show {
            display: block;
        }

        /* PASSWORD TOGGLE */
        .password-toggle {
            position: absolute;
            right: 14px;
            top: 40px;
            cursor: pointer;
            font-size: 18px;
            color: #888;
            transition: all 0.3s ease;
            background: transparent;
            border: none;
            padding: 3px;
        }

        .password-toggle:hover {
            color: #0b4f8a;
        }

        /* Password Strength */
        .password-strength {
            margin-top: 6px;
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            overflow: hidden;
        }

        .password-strength .bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .password-strength-text {
            font-size: 12px;
            margin-top: 4px;
            color: #666;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 15px 0 20px;
            font-size: 13px;
            color: #555;
        }

        .terms input[type="checkbox"] {
            margin-top: 2px;
            width: 18px;
            height: 18px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .terms a {
            color: #0b4f8a;
            text-decoration: none;
            font-weight: 600;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .signup-btn {
            width: 100%;
            padding: 14px;
            background: #0b4f8a;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .signup-btn:hover {
            background: #1a7fc4;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(11, 79, 138, 0.3);
        }

        .signup-btn:active {
            transform: scale(0.98);
        }

        .signup-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .login-link {
            text-align: center;
            margin-top: 18px;
            color: #666;
            font-size: 14px;
        }

        .login-link a {
            color: #0b4f8a;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .success-msg {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
            display: none;
            font-size: 14px;
            text-align: center;
        }

        .success-msg.show {
            display: block;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .signup-image {
                padding: 40px 20px;
                min-height: 150px;
            }
            .signup-image-content h1 {
                font-size: 28px;
            }
            .signup-form-container {
                padding: 20px;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="signup-image">
        <div class="signup-image-content">
            <h1>👤 Join EIMS</h1>
            <p>Create your account and start managing<br>employees efficiently</p>
        </div>
    </div>

    <div class="signup-form-container">
        <div class="signup-form">
            <h2>Create Account</h2>
            <p class="subtitle">Fill in the details to register</p>

            <div id="successMsg" class="success-msg">
                ✅ Account created successfully! Redirecting to login...
            </div>

            <form id="signupForm" onsubmit="return validateSignup()">
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name <span class="required">*</span></label>
                        <input type="text" id="firstName" placeholder="Juan" required>
                        <div class="error-message" id="firstNameError">Required</div>
                    </div>

                    <div class="form-group">
                        <label>Last Name <span class="required">*</span></label>
                        <input type="text" id="lastName" placeholder="Dela Cruz" required>
                        <div class="error-message" id="lastNameError">Required</div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email Address <span class="required">*</span></label>
                    <input type="email" id="email" placeholder="juan@email.com" required>
                    <div class="error-message" id="emailError">Please enter a valid email</div>
                </div>

                <div class="form-group">
                    <label>Username <span class="required">*</span></label>
                    <input type="text" id="username" placeholder="juan123" required>
                    <div class="error-message" id="usernameError">Minimum 3 characters</div>
                </div>

                <div class="form-group">
                    <label>Password <span class="required">*</span></label>
                    <input type="password" id="password" placeholder="Create strong password" required>
                    <button type="button" class="password-toggle" id="togglePassword" onclick="togglePassword()">
                        👁️
                    </button>
                    <div class="password-strength">
                        <div class="bar" id="passwordStrengthBar"></div>
                    </div>
                    <div class="password-strength-text" id="passwordStrengthText">Weak</div>
                    <div class="error-message" id="passwordError">Minimum 8 characters</div>
                </div>

                <div class="form-group">
                    <label>Confirm Password <span class="required">*</span></label>
                    <input type="password" id="confirmPassword" placeholder="Confirm password" required>
                    <button type="button" class="password-toggle" id="toggleConfirmPassword" onclick="toggleConfirmPassword()">
                        👁️
                    </button>
                    <div class="error-message" id="confirmPasswordError">Passwords do not match</div>
                </div>


                <div class="terms">
                    <input type="checkbox" id="termsCheckbox" required>
                    <label for="termsCheckbox">
                        I agree to the <a href="#" onclick="alert('Terms and Conditions page')">Terms & Conditions</a> 
                        and <a href="#" onclick="alert('Privacy Policy page')">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" class="signup-btn" id="signupBtn">Create Account</button>

                <div class="login-link">
                    Already have an account? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // PASSWORD TOGGLE
        function togglePassword() {
            const input = document.getElementById('password');
            const btn = document.getElementById('togglePassword');
            if (input.type === 'password') {
                input.type = 'text';
                btn.textContent = '🙈';
            } else {
                input.type = 'password';
                btn.textContent = '👁️';
            }
        }

        function toggleConfirmPassword() {
            const input = document.getElementById('confirmPassword');
            const btn = document.getElementById('toggleConfirmPassword');
            if (input.type === 'password') {
                input.type = 'text';
                btn.textContent = '🙈';
            } else {
                input.type = 'password';
                btn.textContent = '👁️';
            }
        }

        // PASSWORD STRENGTH
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const bar = document.getElementById('passwordStrengthBar');
            const text = document.getElementById('passwordStrengthText');
            
            let strength = 0;
            let color = '';
            let label = '';

            if (password.length >= 8) strength += 1;
            if (password.match(/[a-z]+/)) strength += 1;
            if (password.match(/[A-Z]+/)) strength += 1;
            if (password.match(/[0-9]+/)) strength += 1;
            if (password.match(/[$@#&!]+/)) strength += 1;

            switch(strength) {
                case 0: case 1: color = '#e53935'; label = 'Weak'; break;
                case 2: color = '#ff9800'; label = 'Fair'; break;
                case 3: color = '#ffc107'; label = 'Good'; break;
                case 4: color = '#8bc34a'; label = 'Strong'; break;
                case 5: color = '#4caf50'; label = 'Very Strong'; break;
            }

            bar.style.width = (strength * 20) + '%';
            bar.style.background = color;
            text.textContent = label;
            text.style.color = color;
        });

        // VALIDATION
        function validateSignup() {
            const firstName = document.getElementById('firstName');
            const lastName = document.getElementById('lastName');
            const email = document.getElementById('email');
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');
            const terms = document.getElementById('termsCheckbox');
            const successMsg = document.getElementById('successMsg');

            let isValid = true;

            // First Name
            if (firstName.value.length < 1) {
                document.getElementById('firstNameError').classList.add('show');
                firstName.classList.add('error');
                isValid = false;
            }

            // Last Name
            if (lastName.value.length < 1) {
                document.getElementById('lastNameError').classList.add('show');
                lastName.classList.add('error');
                isValid = false;
            }

            // Email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                document.getElementById('emailError').classList.add('show');
                email.classList.add('error');
                isValid = false;
            }

            // Username
            if (username.value.length < 3) {
                document.getElementById('usernameError').classList.add('show');
                username.classList.add('error');
                isValid = false;
            }

            // Password
            if (password.value.length < 8) {
                document.getElementById('passwordError').classList.add('show');
                password.classList.add('error');
                isValid = false;
            }

            // Confirm Password
            if (password.value !== confirmPassword.value) {
                document.getElementById('confirmPasswordError').classList.add('show');
                confirmPassword.classList.add('error');
                isValid = false;
            }

            // Terms
            if (!terms.checked) {
                alert('Please agree to the Terms and Conditions');
                isValid = false;
            }

            if (!isValid) return false;

            // Success
            document.getElementById('signupBtn').disabled = true;
            document.getElementById('signupBtn').textContent = 'Creating Account...';
            successMsg.classList.add('show');

            setTimeout(function() {
                alert('✅ Account created successfully!');
                window.location.href = 'login.html';
            }, 2000);

            return false;
        }

        // CLEAR ERRORS ON INPUT
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
                const errorDiv = this.parentElement.querySelector('.error-message');
                if (errorDiv) errorDiv.classList.remove('show');
            });
        });
    </script>
</body>
</html>