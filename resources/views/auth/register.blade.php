<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .main-box {
      width: 900px;
      background: #fff;
      border-radius: 25px;
      padding: 0;
      display: flex;
      overflow: hidden;
      box-shadow: 0 0 30px rgba(0,0,0,0.1);
    }

    .left-box {
      width: 55%;
      padding: 40px;
    }

    .right-box {
      width: 45%;
      background: #8b5cf6;
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 40px;
      text-align: center;
      border-radius: 100px 0 0 100px;
    }

    .left-box input {
      border-radius: 10px;
      height: 45px;
    }

    .btn-main {
      width: 100%;
      background: #6d47e8;
      border: none;
      color: #fff;
      height: 45px;
      border-radius: 10px;
      font-weight: bold;
    }

    .social-icons button {
      border: 1px solid #ccc;
      background: white;
      border-radius: 10px;
      width: 50px;
      height: 45px;
      margin-right: 10px;
    }

    .social-icons i {
      font-size: 20px;
    }

  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="main-box">

    <!-- LEFT SIDE FORM -->
    <div class="left-box">
      <h2 class="fw-bold mb-4">Registration</h2>

      <form action="{{ url('/register') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="fw-semibold">Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="fw-semibold">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="fw-semibold">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="fw-semibold">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button class="btn-main">Register</button>
      </form>

      <p class="text-center mt-3">or register with social platforms</p>

      <div class="d-flex social-icons">
        <button><i class="fab fa-google"></i></button>
        <button><i class="fab fa-facebook-f"></i></button>
        <button><i class="fab fa-pinterest-p"></i></button>
        <button><i class="fab fa-linkedin-in"></i></button>
      </div>
    </div>

    <!-- RIGHT SIDE PANEL -->
    <div class="right-box">
      <h2 class="fw-bold">FAMILY MANAGEMENT</h2>
      <p>Already have an account?</p>

      <a href="{{ url('/login') }}" class="btn btn-outline-light px-5 mt-2">Login</a>
    </div>

  </div>
</div>

</body>
</html>
