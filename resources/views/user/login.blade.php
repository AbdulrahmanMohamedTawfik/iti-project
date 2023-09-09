<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="{{ asset('assets/css/login_style.css') }}" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div id="form-container">
        <form id="myForm" name="loginForm" action="{{ route('user.login') }}" method="POST">
            <h2>Login</h2>
            <fieldset id="fieldset">
                <div id="mydiv">
                    @csrf
                    <legend>Your Info</legend>
                    <label for="email">Email</label>
                    <input type="email" id="emaill" name="email" placeholder="Enter your email"
                        autocomplete="email" required>
                    <br>
                    <span id="emailError" class="error"></span>
                    <br>
                    <label for="password">Password</label>
                    <div class="password-input-container">
                        <input type="password" id="pass" name="password" placeholder="Enter your password"
                            autocomplete="current-password" required>
                        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                    </div>
                    <span id="passwordError" class="error"></span>
                    @if ($errors->has('loginError'))
                        <span class="error">{{ $errors->first('loginError') }}</span>
                        <!-- Display login error if present -->
                    @endif
                </div>
                <input class="rounded-button" type="submit" value="Submit">
                <input class="rounded-button" type="reset" value="Reset">
                <p>Don't have an account? <a href="{{ route('user.show_reg') }}">Sign Up</a></p>
            </fieldset>
        </form>
    </div>
    {{-- <script src="{{ asset('assets/js/login_validate.js') }}"></script> --}}
    <script src="{{ asset('assets/js/toggle_password.js') }}"></script>

</body>

</html>
