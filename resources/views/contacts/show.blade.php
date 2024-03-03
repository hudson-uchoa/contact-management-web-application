@extends('layouts.app')

@section('title', 'Contact Details')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Contact Details</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $contact->name }}</p>
                        <p><strong>Email:</strong> {{ $contact->email }}</p>
                        <p><strong>Phone:</strong> {{ $contact->contact }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('contacts.modal.confirmation')