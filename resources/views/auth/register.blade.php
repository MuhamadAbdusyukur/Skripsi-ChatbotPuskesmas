@extends('layouts.main')

@section('post')
<h2>Register Pengunjung</h2>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label>Nama:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Password:</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Daftar</button>
</form>
@endsection
