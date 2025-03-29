<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff8f6;
      font-family: 'Raleway', sans-serif;
      margin: 0;
      padding: 0;
    }
    .container-fluid {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .content-wrapper {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      gap: 2rem;
    }
    .form-container {
      width: 400px;
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
      padding: 2rem;
      text-align: center;
    }
    .form-container img {
      margin-bottom: 1rem;
    }
    .form-container h2 {
      margin-top: 0.5rem;
    }
    .form-container .form-control {
      background-color: #fef7f5;
      border: none;
      border-radius: 8px;
      margin-bottom: 1rem;
    }
    .form-container .form-control:focus {
      border: 1px solid #ed6c63;
      box-shadow: none;
    }
    .form-container .btn-primary {
      background-color: #ed6c63;
      border: none;
      border-radius: 8px;
      padding: 0.75rem;
      font-weight: bold;
    }
    .form-container .btn-primary:hover {
      background-color: #d85950;
    }
    .form-container a {
      color: #ed6c63;
      text-decoration: none;
    }
    .form-container a:hover {
      text-decoration: underline;
    }
    .illustration img {
      max-width: 450px;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="content-wrapper">
      <!-- Login Form -->
      <div class="form-container">
        <img src="{{asset('image/IMG_7281-removebg-preview.png')}}" width="100px" alt="Logo">
        <p>Fill the credential</p>
        <h2 class="mb-3">Register</h2>
        <form method="POST" action="{{ route('register.post') }}">
          @csrf
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name@example.com" required>
              <label for="name" class="form-label">{{ __('Name') }}</label>
            </div>
            @error('name')
                  <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
              <label for="email" class="form-label">{{ __('Email Address') }}</label>
            </div>
            @error('email')
                  <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
              <label for="password" class="form-label">{{ __('Password') }}</label>
            </div>
            @error('password')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="password_confirmation" required>
              <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            </div>
            @error('password_confirmation')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
              <input type="checkbox" id="remember" name="remember">
              <label for="remember" class="text-muted">Keep me logged in</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100">Register</button>
          <p class="text-center mt-3">I have an account!! <a href="{{ route('login') }}">Sign up</a></p>
        </form>
      </div>
      <!-- Illustration -->
      <div class="illustration">
        <img src="{{asset('image/IMG_9880.jpg')}}" alt="Illustration of a person with a cart">
      </div>
    </div>
  </div>
</body>
</html>
