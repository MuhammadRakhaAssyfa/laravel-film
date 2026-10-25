@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Edit Film</h3>

            <form action="{{ route('film.update', $film->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group @error('title') has-error @enderror">
                    <label for="title">Judul</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ old('title', $film->title) }}">
                    @error('title')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('sinopsis') has-error @enderror">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" class="form-control" rows="5">{{ old('sinopsis', $film->sinopsis) }}</textarea>
                    @error('sinopsis')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('year') has-error @enderror">
                    <label for="year">Tahun</label>
                    <input name="year" type="number" class="form-control" id="year" value="{{ old('year', $film->year) }}">
                    @error('year')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('genre_id') has-error @enderror">
                    <label for="genre_id">Genre</label>
                    <select name="genre_id" id="genre_id" class="form-control">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre_id', $film->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @error('genre_id')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group @error('poster') has-error @enderror">
                    <label for="poster">Poster (kosongkan jika tidak diganti)</label>
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset($film->poster) }}" width="100" alt="poster saat ini">
                    </div>
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