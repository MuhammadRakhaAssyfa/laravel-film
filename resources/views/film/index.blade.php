@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <h3>Data Film</h3>
    <a href="{{ route('film.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">+ Film</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Poster</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Genre</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($films as $key => $film)
                <tr>
                    <td>{{ $films->firstItem() + $key }}</td>
                    <td><img src="{{ asset($film->poster) }}" width="50" alt="poster"></td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->year }}</td>
                    <td>{{ $film->genre->name }}</td>
                    <td>
                        <a href="{{ route('movies.show', $film->id) }}" class="btn btn-info btn-xs">Detail</a>
                        <a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning btn-xs">Edit</a>

                        <form action="{{ route('film.destroy', $film->id) }}" method="post" style="display: inline;"
                              onsubmit="return confirm('Yakin hapus film ini?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Data Masih Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $films->links('pagination::bootstrap-3') }}
</div>
@endsection