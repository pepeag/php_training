@extends('layouts.master')
@section('content')
    @if (session('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success_msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mb-3 me-3 mt-0 float-end">
        <a href="{{ url('/students/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Student</a>
    </div>
    <div class="mb-3 ms-3 me-5 mt-0 float-start">
        <a href="{{ url('/export/') }}" class="btn btn-success"></i>Export CSV</a>
    </div>
    <div class="mb-3 me-5 mt-0">
        <a href="{{ url('/importFile') }}" class="btn btn-success"></i>Import CSV</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Major Name</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->major->name }}</td>
                    <td>{{ $item->date_of_birth }}</td>
                    <td>{{ $item->address }}</td>
                    <td>

                        <a href="{{ url('/students/' . $item->id . '/edit') }}" style="text-decoration: none">
                            <i class="fas fa-edit text-primary me-3"></i>
                        </a>
                        <i class="fas fa-trash-alt text-danger" style="cursor: pointer" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $item->id }}">
                        </i>

                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content ">
                                    <div class="modal-header text-center">
                                        <h3 class="modal-title " id="exampleModalLabel">Confirm Delete</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Are you sure to delete this record?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm me-3" data-bs-dismiss="modal">No</button>
                                        <form action="{{ url('/students/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <p class="d-flex justify-content-center text-danger">There is no student data.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
