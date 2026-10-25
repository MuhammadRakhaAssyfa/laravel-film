@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <h3>Data Pemeran</h3>
    <a href="{{ route('cast.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">+ Data Pemeran</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($casts as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->age }}</td>
                    <td>
                        <a href="{{ route('cast.show', $value->id) }}" class="btn btn-info btn-xs">Detail</a>
                        <a href="{{ route('cast.edit', $value->id) }}" class="btn btn-warning btn-xs">Edit</a>

                        <form action="{{ route('cast.destroy', $value->id) }}" method="post" style="display: inline;"
                              onsubmit="return confirm('Yakin hapus data pemeran ini?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data Masih Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection