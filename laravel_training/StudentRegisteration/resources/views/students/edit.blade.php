@extends('layouts.master')
@section('content')
    <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Edit Student</h3>
        </div>
        <div class="card-body">
            <form action="{{route('students.update',$item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" value="{{old('name',$item->name)}}">
                    @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email',$item->email)}}">
                    @if ($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose Major</label>
                    <select class="form-select" name="major_id">
                        <option value="">Choose Major</option>
                        @foreach ($majors as $key => $value)
                            @if ($item->major_id == $key)
                                <option value="{{ $key }}" selected>
                                    {{ $value }}
                                </option>
                            @else
                                <option value="{{ $key }}">
                                    {{ $value }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('major'))
                        <small class="text-danger">{{ $errors->first('major') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Date Of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" value="{{old('date_of_birth',$item->date_of_birth)}}">
                    @if ($errors->has('date_of_birth'))
                        <small class="text-danger">{{ $errors->first('date_of_birth') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="address" name="address" class="form-control" value="{{old('address',$item->address)}}">
                    @if ($errors->has('address'))
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                    @endif
                </div>
                <input type="submit" value="Update" class="btn btn-primary float-end">
            </form>
        </div>
    </div>
@endsection
