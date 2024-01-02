<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login | Your Website</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <h1>Register</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <p>have an account? <a href="{{ route('login.form') }}"><span style="color: blue;">Login</span></a></p>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>IDKu</h1>
                    <h2>Welcome, Friends!</h2>
                    <p>Enter your personal details to use all of site features</p>
                </div>
            </div>
        </div>
    </div>   
 </div>

    <script src="script.js"></script>
</body>

</html>
