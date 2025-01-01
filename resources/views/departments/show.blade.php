@extends('layouts.app')

@section('title', 'Department Details')

@section('content')
<h1>Department: {{ $department->name }}</h1>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">Details</h5>
        <p><strong>Code:</strong> {{ $department->code }}</p>
        <p><strong>Phone:</strong> {{ $department->phone }}</p>
        <p><strong>Email:</strong> {{ $department->email }}</p>
        <p><strong>Website:</strong> <a href="{{ $department->website }}" target="_blank">{{ $department->website }}</a></p>
        <p><strong>Address:</strong> {{ $department->address }}</p>
    </div>
</div>

<h2>Staff Members</h2>
@if($department->staff->isEmpty())
    <p>No staff members in this department.</p>
@else
    <ul class="list-group">
        @foreach($department->staff as $staff)
            <li class="list-group-item">
                <a href="{{ route('staff.show', $staff->id) }}">{{ $staff->name }}</a>
                ({{ $staff->title }})
            </li>
        @endforeach
    </ul>
@endif

@if(auth()->user()->role === 'admin')
    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning mt-3">Edit Department</a>
    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this department?')">Delete Department</button>
    </form>
@endif

<a href="{{ route('departments.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
