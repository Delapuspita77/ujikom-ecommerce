@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div style="max-width:400px;margin:0 auto;padding:2rem;background:#fff;border-radius:8px;box-shadow:0 2px 8px rgb(0 0 0 / 0.1);">
    <h2 style="margin-bottom:1.5rem;">Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div style="margin-bottom:1rem;">
            <label>Name</label>
            <input type="text" name="name" required style="width:100%;padding:0.5rem;border:1px solid #ddd;border-radius:4px;">
        </div>
        <div style="margin-bottom:1rem;">
            <label>Email</label>
            <input type="email" name="email" required style="width:100%;padding:0.5rem;border:1px solid #ddd;border-radius:4px;">
        </div>
        <div style="margin-bottom:1rem;">
            <label>Password</label>
            <input type="password" name="password" required style="width:100%;padding:0.5rem;border:1px solid #ddd;border-radius:4px;">
        </div>
        <div style="margin-bottom:1rem;">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required style="width:100%;padding:0.5rem;border:1px solid #ddd;border-radius:4px;">
        </div>
        <button type="submit" style="width:100%;background:#28a745;color:white;padding:0.75rem;border:none;border-radius:4px;font-weight:600;">
            Register
        </button>
    </form>
    <p style="margin-top:1rem;font-size:0.9rem;">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</div>
@endsection
