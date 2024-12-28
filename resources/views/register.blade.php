<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register G109</title>
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

    .register-container {
      width: 400px;
      padding: 30px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      position: relative;
      z-index: 2;
      backdrop-filter: blur(10px);
    }

    .register-container h1 {
      color: #2575FC;
      text-align: center;
      font-size: 32px;
      margin-bottom: 10px;
    }

    .register-container p {
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

    .register-btn {
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

    .register-btn:hover {
      background: linear-gradient(90deg, #2575FC, #6A11CB);
      transform: scale(1.05);
    }

    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 8px;
    }

    .alert-danger {
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
    }

    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border-color: #c3e6cb;
    }
  </style>
</head>
<body>
  <div class="background"></div>
  <div class="register-container">
    <h1>G109 Bimbel</h1>
    <p>Daftar untuk Memulai Belajar</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukkan Email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required>
      </div>
      <div class="form-group">
        <label for="role">Daftar Sebagai</label>
        <select name="role" id="role">
          <option value="siswa">Siswa</option>
          <option value="pengajar">Pengajar</option>
          <option value="pengelola">Pengelola</option>
        </select>
      </div>
      <button type="submit" class="register-btn">Daftar</button>
    </form>
  </div>
</body>
</html>
