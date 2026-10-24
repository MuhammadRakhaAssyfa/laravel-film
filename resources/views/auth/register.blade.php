@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Daftar Akun Baru</h3>

            <form action="{{ route('register.store') }}" method="post">
                @csrf

                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nama lengkap">
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('email') has-error @enderror">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('password') has-error @enderror">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Minimal 6 karakter">
                    @error('password')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Ulangi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ketik ulang password">
                </div>

                <div class="form-group @error('age') has-error @enderror">
                    <label for="age">Umur</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" placeholder="Umur">
                    @error('age')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('bio') has-error @enderror">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Minimal 20 karakter">{{ old('bio') }}</textarea>
                    @error('bio')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('alamat') has-error @enderror">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Minimal 30 karakter">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Daftar</button>
                <a href="#" data-toggle="modal" data-target="#myModal" style="margin-left: 15px;">Saya sudah punya akun</a>
            </form>
        </div>
    </div>
</div>
@endsection