@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-4 text-end">
                @auth
                    <a href="{{ route('contacts.create') }}" class="btn btn-primary">Add Contact</a>
                @endauth
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>List of Contacts</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            @auth
                                <th>Actions</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr class="table-row">
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td>{{ $contact->email }}</td>
                                @auth
                                    <td>
                                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm me-2">
                                            <i class="bi bi-pencil-square"></i> Info
                                        </a>
                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary btn-sm me-2">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="#" onclick="confirmDelete({{ $contact->id }})" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                @endauth
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@include('contacts.modal.confirmation')

<script>
    function confirmDelete(contact_id){
        const deleteContactForm = $('#deleteContactForm');
        const url = "{{ route('contacts.destroy', ':contactId') }}".replace(':contactId', contact_id);
        deleteContactForm.attr('action', url);
        console.log(deleteContactForm.action);
        $('#confirmDeleteModal').modal('show');    
    }
</script>