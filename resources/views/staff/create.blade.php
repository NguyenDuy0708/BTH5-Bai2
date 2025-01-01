@extends('layouts.app')

@section('title', 'Add Staff Member')

@section('content')
<h1>Add Staff Member</h1>

<form action="{{ route('staff.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label for="academic_rank" class="form-label">Academic Rank</label>
        <input type="text" class="form-control" id="academic_rank" name="academic_rank" value="{{ old('academic_rank') }}">
    </div>

    <div class="mb-3">
        <label for="degree" class="form-label">Degree</label>
        <input type="text" class="form-control" id="degree" name="degree" value="{{ old('degree') }}">
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label for="department_id" class="form-label">Department</label>
        <select id="department_id" name="department_id" class="form-select" required>
            <option value="" disabled selected>Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
