@extends('layouts.app')
@section('title', 'Categories')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Contact Messages</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table " cellspacing="0" width="100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Created_At</th>
                                    <th>Action</th>

                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key=>$contact)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                                                <form id="delete-form-{{ $contact->id }}" method="POST" action="{{ route('contact.destroy', $contact->id) }}" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button onclick="if (confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $contact->id }}').submit();
                                                    }else{
                                                    event.preventDefault();
                                                    } " class="btn btn-danger btn-sm" type="button"><i class="material-icons">delete</i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@endpush
