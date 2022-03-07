@extends('layouts.master')
@section('content')
    <a href="{{ route('students.index') }}" class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Import Student Data</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Choose Your File</label>
                    <input type="file" name="file" class="form-control" required>
                    @if ($errors->has('file'))
                        <small class="text-danger">*{{ $errors->first('file') }}</small>
                    @endif
                </div>
                <input type="submit" value="Import Excel" class="btn btn-primary float-end">
            </form>
        </div>
    </div>
@endsection
