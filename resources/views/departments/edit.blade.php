@extends('layouts.app')

@section('title', 'Edit Department')

@section('content')
<h1>Edit Department</h1>

<form action="{{ route('departments.update', $department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $department->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $department->code) }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $department->phone) }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $department->email) }}">
    </div>

    <div class="mb-3">
        <label for="website" class="form-label">Website</label>
        <input type="url" class="form-control" id="website" name="website" value="{{ old('website', $department->website) }}">
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $department->address) }}">
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
