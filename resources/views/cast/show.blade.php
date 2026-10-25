@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Detail Pemeran</h3>

            <div class="form-group">
                <label>Nama Pemeran</label>
                <input type="text" class="form-control" value="{{ $cast->name }}" disabled>
            </div>

            <div class="form-group">
                <label>Umur</label>
                <input type="number" class="form-control" value="{{ $cast->age }}" disabled>
            </div>

            <div class="form-group">
                <label>Biografi Pemeran</label>
                <textarea class="form-control" rows="5" disabled>{{ $cast->bio }}</textarea>
            </div>

            <a href="{{ route('cast.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection