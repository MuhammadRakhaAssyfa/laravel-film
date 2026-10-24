@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3>Login</h3>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif

            @error('notif')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <form action="{{ route('login.authenticate') }}" method="post">
                @csrf

                <div class="form-group @error('email') has-error @enderror">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('password') has-error @enderror">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    @error('password')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('register.create') }}" style="margin-left: 15px;">Daftar akun baru</a>
            </form>
        </div>
    </div>
</div>
@endsection