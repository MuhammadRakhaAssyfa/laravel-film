@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Edit Peran</h3>

            <form action="{{ route('peran.update', $peran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group @error('film_id') has-error @enderror">
                    <label for="film_id">Film</label>
                    <select name="film_id" id="film_id" class="form-control">
                        @foreach ($films as $film)
                            <option value="{{ $film->id }}" {{ old('film_id', $peran->film_id) == $film->id ? 'selected' : '' }}>{{ $film->title }}</option>
                        @endforeach
                    </select>
                    @error('film_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('cast_id') has-error @enderror">
                    <label for="cast_id">Pemeran</label>
                    <select name="cast_id" id="cast_id" class="form-control">
                        @foreach ($casts as $cast)
                            <option value="{{ $cast->id }}" {{ old('cast_id', $peran->cast_id) == $cast->id ? 'selected' : '' }}>{{ $cast->name }}</option>
                        @endforeach
                    </select>
                    @error('cast_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('actor') has-error @enderror">
                    <label for="actor">Tokoh yang diperankan</label>
                    <input name="actor" type="text" class="form-control" id="actor" value="{{ old('actor', $peran->actor) }}">
                    @error('actor')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('peran.index') }}" style="margin-left: 15px;">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection