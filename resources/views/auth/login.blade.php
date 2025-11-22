<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      
      font-family: "Poppins", sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      width: 900px;
      height: 500px;
      background: #fff;
      border-radius: 25px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      display: flex;
      overflow: hidden;
    }

    /* LEFT Panel */
    .left-panel {
      width: 45%;
      background: linear-gradient(135deg, #6a61ff, #9a7bff);
      padding: 50px 40px;
      color: #fff;
      border-radius: 25px 120px 25px 25px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .left-panel h1 {
      font-size: 35px;
      font-weight: 700;
    }

    .left-panel p {
      opacity: 0.9;
      margin-top: 10px;
      margin-bottom: 30px;
    }

    .left-panel a {
      padding: 10px 35px;
      border: 2px solid #fff;
      border-radius: 8px;
      color: #fff;
      text-decoration: none;
      font-size: 16px;
      transition: .3s;
      width: fit-content;
    }

    .left-panel a:hover {
      background: rgba(255,255,255,0.2);
    }

    /* RIGHT Panel */
    .right-panel {
      width: 55%;
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;   /* ← CENTER FIX */
    }

    .right-panel h2 {
      font-size: 28px;
      margin-bottom: 25px;
      text-align: center;         /* ← CENTER TEXT */
      font-weight: 600;
    }

    .form-label {
      font-size: 14px;
      color: #555;
    }

    .form-control {
      padding: 12px;
      border-radius: 8px;
    }

    .btn-login {
      width: 100%;
      padding: 12px;
      background: #7c6dff;
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 16px;
      margin-top: 10px;
      transition: .3s;
    }

    .btn-login:hover {
      background: #6f62ff;
    }

    .forgot {
      text-align: right;
      font-size: 13px;
      color: #777;
      margin-top: -10px;
      cursor: pointer;
    }

    .register-text {
      margin-top: 20px;
      text-align: center;
      font-size: 14px;
    }

  </style>

</head>
<body>

<div class="login-box">

  <!-- LEFT SIDE -->
  <div class="left-panel">
    <h1> FAMILY MANAGEMENT</h1>
    <p>Don’t have an account?</p>
    <a href="{{ url('/register') }}">Register</a>
  </div>

  <!-- RIGHT SIDE -->
  <div class="right-panel">
    <h2>Login</h2>

    <form action="{{ url('/login') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-1">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="forgot">Forgot Password?</div>

      <button class="btn-login">Login</button>

      @error('email')
      <div class="alert alert-danger mt-2">{{ $message }}</div>
      @enderror

    </form>

    <p class="register-text">
      New user? <a href="{{ url('/register') }}">Register</a>
    </p>

  </div>

</div>

</body>
</html>
