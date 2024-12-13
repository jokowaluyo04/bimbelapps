<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login G109</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #6A11CB, #2575FC);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .background {
      position: absolute;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 10%, transparent 80%);
      animation: moveBackground 10s infinite linear;
    }

    @keyframes moveBackground {
      0% { transform: translate(0, 0); }
      50% { transform: translate(30px, 30px); }
      100% { transform: translate(0, 0); }
    }

    .login-container {
      width: 400px;
      padding: 30px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      position: relative;
      z-index: 2;
      backdrop-filter: blur(10px);
    }

    .login-container h1 {
      color: #2575FC;
      text-align: center;
      font-size: 32px;
      margin-bottom: 10px;
    }

    .login-container p {
      color: #6A11CB;
      text-align: center;
      font-size: 16px;
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      color: #333333;
      font-weight: 600;
      margin-bottom: 5px;
      font-size: 14px;
    }

    .form-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #D1D1D1;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
      transition: all 0.3s ease-in-out;
    }

    .form-group input:focus {
      border-color: #6A11CB;
      box-shadow: 0 0 8px rgba(106, 17, 203, 0.4);
    }

    .login-btn {
      width: 100%;
      padding: 12px;
      background: linear-gradient(90deg, #6A11CB, #2575FC);
      color: #FFFFFF;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      transition: all 0.3s ease-in-out;
    }

    .login-btn:hover {
      background: linear-gradient(90deg, #2575FC, #6A11CB);
      transform: scale(1.05);
    }

    .register-link {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #2575FC;
      font-size: 14px;
      text-decoration: none;
      transition: all 0.3s ease-in-out;
    }

    .register-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="background"></div>
  <div class="login-container">
    <h1>G109 Bimbel</h1>
    <p>Belajar Lebih Mudah, Cepat, dan Menyenangkan</p>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukkan Email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
      </div>
      <button type="submit" class="login-btn">Masuk</button>
    </form>
    <a href="{{ route('register') }}" class="register-link">Belum punya akun? Daftar di sini</a>
  </div>
</body>
</html>
