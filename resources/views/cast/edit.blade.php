@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Edit Pemeran</h3>

            <form action="{{ route('cast.update', $cast->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Nama Pemeran</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $cast->name) }}" placeholder="Nama Pemeran">
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('age') has-error @enderror">
                    <label for="age">Umur</label>
                    <input name="age" type="number" class="form-control" id="age" value="{{ old('age', $cast->age) }}" placeholder="Umur Pemeran">
                    @error('age')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('bio') has-error @enderror">
                    <label for="bio">Biografi Pemeran</label>
                    <textarea name="bio" id="bio" class="form-control" rows="5" placeholder="Minimal 20 karakter">{{ old('bio', $cast->bio) }}</textarea>
                    @error('bio')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('cast.index') }}" style="margin-left: 15px;">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection