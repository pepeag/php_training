@extends('layouts.master')
@section('content')
    <div class="mb-3 me-3 mt-0 float-end" style="clear: both;display: block;content: '';">
        <button class="btn btn-primary show-form-modal" data-type="CREATE"> <i class="fa fa-plus"></i> Add
            Student</button>
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
        <tbody id="studentTBody">
            <tr>
                <td colspan="7">
                    <p class="d-flex justify-content-center text-danger">There is no student data.</p>
                </td>
            </tr>
        </tbody>
    </table>
    @include('spa.students.form-modal')
    @include('spa.students.delete-modal')
    {{-- @include('spa.students.form-edit-modal') --}}
@endsection
