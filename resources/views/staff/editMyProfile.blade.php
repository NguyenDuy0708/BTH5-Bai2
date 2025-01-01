@extends('layouts.app')

@section('title', 'Edit My Profile')

@section('content')
<h1>Edit My Profile</h1>

<form action="{{ route('staff.updateMyProfile') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $staff->phone) }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $staff->email) }}">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
