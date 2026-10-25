@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <h3>Data Peran</h3>
    <a href="{{ route('peran.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 15px;">+ Peran</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Film</th>
                <th>Pemeran</th>
                <th>Tokoh</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($perans as $key => $peran)
                <tr>
                    <td>{{ $perans->firstItem() + $key }}</td>
                    <td>{{ $peran->film->title }}</td>
                    <td>{{ $peran->cast->name }}</td>
                    <td>{{ $peran->actor }}</td>
                    <td>
                        <a href="{{ route('peran.edit', $peran->id) }}" class="btn btn-warning btn-xs">Edit</a>

                        <form action="{{ route('peran.destroy', $peran->id) }}" method="post" style="display: inline;"
                              onsubmit="return confirm('Yakin hapus data peran ini?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Data Masih Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $perans->links('pagination::bootstrap-3') }}
</div>
@endsection