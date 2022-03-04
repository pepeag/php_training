@extends('layouts.master')
@section('content')
    @if (session('success_msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success_msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mb-3 me-3 mt-3 float-end">
        <a href="{{ url('/students/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Student</a>
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
                        <x-delete-btn :url="route('students.destroy',$item->id)" :id="$item->id" />
                        <a href="{{ url('/students/' . $item->id . '/edit') }}"><i class="fas fa-edit text-primary"></i></a>
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
