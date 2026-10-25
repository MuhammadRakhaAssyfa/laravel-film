@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <h3>Profil Saya</h3>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
            </div>

            <div class="form-group">
                <label>Umur</label>
                <input type="text" class="form-control" value="{{ $profile->umur }}" disabled>
            </div>

            <div class="form-group">
                <label>Bio</label>
                <textarea class="form-control" rows="3" disabled>{{ $profile->bio }}</textarea>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" disabled>{{ $profile->alamat }}</textarea>
            </div>

            <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profil</a>
            <a href="{{ route('dashboard.user') }}" style="margin-left: 15px;">Kembali</a>
        </div>
    </div>
</div>
@endsection