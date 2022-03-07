@extends('layouts.master')
@section('content')
    <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Create Student</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Student Name">
                    @if ($errors->has('name'))
                        <small class="text-danger">*{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Student Email">
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose Major</label>
                    <select class="form-select" name="major_id" >
                        <option value="">Choose Major</option>
                        @foreach ($majors as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('major'))
                        <small class="text-danger">{{ $errors->first('major') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{old('date_of_birth')}}" placeholder="Enter Student Birth Date">
                    @if ($errors->has('date_of_birth'))
                        <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="address" name="address" value="{{old('address')}}"class="form-control" placeholder="Enter Student Address">
                    @if ($errors->has('address'))
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    @endif
                </div>
                <input type="submit" value="Add Student" class="btn btn-primary float-end">
            </form>
        </div>
    </div>
@endsection
