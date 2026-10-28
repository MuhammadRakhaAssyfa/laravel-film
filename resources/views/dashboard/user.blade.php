@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <h3><b>Halo, {{ Auth::user()->name }}!</b></h3>
    <p><a href="{{ route('profile.show') }}" class="btn btn-info btn-sm">Profil Saya</a></p>

    <h4 style="margin-top: 30px;">Daftar Film</h4>

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
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada film</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $films->links('pagination::bootstrap-3') }}
</div>
@endsection