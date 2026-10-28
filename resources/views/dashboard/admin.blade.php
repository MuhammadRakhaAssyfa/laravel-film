@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">  
    <h3><b>Halo, {{ Auth::user()->name }}!</b></h3>
<h4 style="margin-top: 30px;">Daftar User</h4>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $users->firstItem() + $key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->profile->umur }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links('pagination::bootstrap-3') }}
</div>
@endsection
