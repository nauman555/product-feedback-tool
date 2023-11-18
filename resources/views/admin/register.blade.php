<!-- resources/views/admin/register.blade.php -->

@extends('layouts.admin')

@section('content')
    <h1>Admin Registration</h1>

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <!-- Add form fields for name, email, password, etc. -->

        <button type="submit">Register Admin</button>
    </form>
@endsection
