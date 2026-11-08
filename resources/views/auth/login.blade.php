@extends('templates.index')

@section('content')
<style>
  .form-module .page-error {
    color: red;
    margin: -12px 0 15px;
    font-size: 13px;
  }
</style>

<div class="container" style="padding: 40px 0;">
  <div class="w3_login_module" style="max-width: 600px; margin: 0 auto;">
    <div class="module form-module">

      <div class="form" style="display: block;">
        <h3>Login to your account</h3>

        @if (session('success'))
          <p style="color: green; margin-top: 0;">{{ session('success') }}</p>
        @endif

        @error('notif')
          <p class="page-error" style="margin-top: 0;">{{ $message }}</p>
        @enderror

        <form action="{{ route('login.authenticate') }}" method="post">
          @csrf

          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
          @error('email')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <input type="password" name="password" placeholder="Password">
          @error('password')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <input type="submit" value="Login">
        </form>

        <p style="text-align: center; margin: 20px 0 0;">
          Belum punya akun? <a href="{{ route('register.create') }}">Daftar akun baru</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection