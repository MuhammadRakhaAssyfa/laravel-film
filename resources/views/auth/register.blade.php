@extends('templates.index')

@section('content')
<style>
  /* textarea mengikuti gaya kotak isian template */
  .form-module .form textarea {
    outline: none;
    display: block;
    width: 100%;
    border: 1px solid #d9d9d9;
    margin: 0 0 20px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
    font-family: inherit;
  }
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
        <h3>Create an account</h3>

        <form action="{{ route('register.store') }}" method="post">
          @csrf

          <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}">
          @error('name')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
          @error('email')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <input type="password" name="password" placeholder="Password (minimal 6 karakter)">
          @error('password')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <input type="password" name="password_confirmation" placeholder="Ulangi password">

          <input type="text" inputmode="numeric" name="age" placeholder="Umur" value="{{ old('age') }}">
          @error('age')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <textarea name="bio" rows="3" placeholder="Bio (minimal 20 karakter)">{{ old('bio') }}</textarea>
          @error('bio')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <textarea name="alamat" rows="3" placeholder="Alamat (minimal 30 karakter)">{{ old('alamat') }}</textarea>
          @error('alamat')
            <p class="page-error">{{ $message }}</p>
          @enderror

          <input type="submit" value="Register">
        </form>

        <p style="text-align: center; margin: 20px 0 0;">
          Sudah punya akun? <a href="{{ route('login.login') }}">Saya sudah punya akun</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection