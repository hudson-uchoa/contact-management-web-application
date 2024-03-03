@extends('layouts.app')

@section('title', "{{isset($contact) ? 'Edit' : 'Create'}} Contact")

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{isset($contact) ? 'Edit' : 'Create'}} Contact</div>
                    <div class="card-body">
                        <form method="POST" action="{{ isset($contact) ? route('contacts.update') : route('contacts.store') }}">
                            @csrf
                            @if(isset($contact))
                                $method('PUT')
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $contact->name ?? '') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $contact->email ?? '') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Phone</label>
                                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact', $contact->contact ?? '') }}" required>
                                @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{isset($contact) ? 'Edit' : 'Create'}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection