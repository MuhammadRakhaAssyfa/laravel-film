@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <h3>Dashboard User</h3>
    <p>Halo, {{ Auth::user()->name }}!</p>
    <p><a href="{{ route('profile.show') }}" class="btn btn-info btn-sm">Profil Saya</a></p>

    <form action="{{ route('login.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection