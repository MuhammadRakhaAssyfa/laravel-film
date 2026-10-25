@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Tambah Genre</h3>

            <form action="{{ route('genre.store') }}" method="POST">
                @csrf

                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">Nama Genre</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}" placeholder="Nama Genre">
                    @error('name')
                        <span class="help-block">{{ $message }}</span>
                    @enderror
                </div>

                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('genre.index') }}" style="margin-left: 15px;">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection