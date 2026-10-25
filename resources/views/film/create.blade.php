@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Tambah Film</h3>

            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group @error('title') has-error @enderror">
                    <label for="title">Judul</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ old('title') }}" placeholder="Judul film">
                    @error('title')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('sinopsis') has-error @enderror">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" class="form-control" rows="5" placeholder="Minimal 20 karakter">{{ old('sinopsis') }}</textarea>
                    @error('sinopsis')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('year') has-error @enderror">
                    <label for="year">Tahun</label>
                    <input name="year" type="number" class="form-control" id="year" value="{{ old('year') }}" placeholder="Contoh: 2024">
                    @error('year')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('genre_id') has-error @enderror">
                    <label for="genre_id">Genre</label>
                    <select name="genre_id" id="genre_id" class="form-control">
                        <option value="">-- Pilih Genre --</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @error('genre_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('poster') has-error @enderror">
                    <label for="poster">Poster</label>
                    <input name="poster" type="file" id="poster">
                    @error('poster')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('film.index') }}" style="margin-left: 15px;">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection