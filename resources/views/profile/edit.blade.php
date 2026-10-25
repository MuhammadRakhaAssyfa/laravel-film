@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Edit Profil</h3>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group @error('umur') has-error @enderror">
                    <label for="umur">Umur</label>
                    <input name="umur" type="number" class="form-control" id="umur" value="{{ old('umur', $profile->umur) }}">
                    @error('umur')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('bio') has-error @enderror">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" rows="3">{{ old('bio', $profile->bio) }}</textarea>
                    @error('bio')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('alamat') has-error @enderror">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ old('alamat', $profile->alamat) }}</textarea>
                    @error('alamat')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('profile.show') }}" style="margin-left: 15px;">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection