@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <h3>Data Genre</h3>
    <a href="{{ route('genre.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">+ Genre</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Genre</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        <a href="{{ route('genre.edit', $value->id) }}" class="btn btn-warning btn-xs">Edit</a>

                        <form action="{{ route('genre.delete', $value->id) }}" method="post" style="display: inline;"
                            onsubmit="return confirm('Yakin hapus genre ini?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Data Masih Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection