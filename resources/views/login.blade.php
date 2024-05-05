<style>
    body {
        font-family: "Arial", sans-serif;
        background-color: #050a24; /* Adjust the color to match the image */
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(
        to bottom left, 
        #050A24, 
        rgba(45, 85, 251, 0.5) 50%,  /* Half transparent */
        #050A24
    ),
    linear-gradient(
        to top right, 
        #050A24, 
        rgba(45, 85, 251, 0.5) 50%,  /* Half transparent */
        #050A24
        
    );
    background-blend-mode: normal;
    }
    .logo {
        position: absolute;
        top: 0;
        left: 0;
        padding: 20px; /* Adjust padding as needed */
    }
    .login-container {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px; /* Adjust the width as necessary */
    }
    .login-container h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }
    .form-input {
        width: 100%;
        margin-bottom: 20px;
    }
    .form-input input {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 5px;
    }
    .form-input label {
        color: #333;
    }
    .login-btn {
        background-color: #0056b3;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        width: 100%;
        box-sizing: border-box;
    }
    .login-btn:hover {
        background-color: #004494;
    }
    .login-help {
        text-align: right;
        font-size: 14px;
        margin-bottom: 20px;
    }
    .login-help a {
        color: #0056b3;
        text-decoration: none;
    }
    .login-help a:hover {
        text-decoration: underline;
    }
    .signup-text {
        text-align: center;
        font-size: 14px;
    }
    .signup-text a {
        color: #0056b3;
        text-decoration: none;
    }
    .signup-text a:hover {
        text-decoration: underline;
    }
</style>
<img  src="{{
    asset(
        'images/logo_EXIA_RVB_fondN-removebg-preview.png'
    )
}}"
width="100"
alt="#" alt="Logo" class="logo">

<div class="login-container">
    <h2>Login to your account</h2>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="form-input">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="balamia@gmail.com"
            />
        </div>
        <div class="form-input">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
            />
        </div>
        <div class="login-help">
            <a href="#">Forgot?</a>
        </div>
        <button type="submit" class="login-btn">Login now</button>
    </form>
    <div class="signup-text">
        <p>Don't Have An Account? <a href="#">Sign Up</a></p>
    </div>
</div>
