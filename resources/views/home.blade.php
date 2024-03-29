@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                @if(auth()->check())
                    <h1>Welcome back, {{ auth()->user()->name }}!</h1>
                @else
                    <h1>Welcome to Contact Management</h1>
                @endif
                <p class="lead">A simple and efficient way to manage your contacts.</p>
                @if(auth()->check())
                    <p>You can now start managing your contacts by clicking the link below.</p>
                @else
                    <p>Sign in to start managing your contacts or create a new account if you don't have one yet.</p>
                @endif
                <div class="mt-4">
                    @if(auth()->check())
                        <a href="{{ route('contacts.index') }}" class="btn btn-primary">View Contacts</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Sign In</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Create Account</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection