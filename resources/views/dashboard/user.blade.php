@extends('templates.index')

@section('content')
<div class="container" style="padding: 40px 0;">
    <h3>Dashboard User</h3>
    <p>Halo, {{ Auth::user()->name }}!</p>

    <form action="{{ route('login.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection