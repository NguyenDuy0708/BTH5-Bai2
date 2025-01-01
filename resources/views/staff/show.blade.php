@extends('layouts.app')

@section('title', 'Staff Member Details')

@section('content')
<h1>Staff Member: {{ $staff->name }}</h1>

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">Details</h5>
        <p><strong>Title:</strong> {{ $staff->title }}</p>
        <p><strong>Academic Rank:</strong> {{ $staff->academic_rank }}</p>
        <p><strong>Degree:</strong> {{ $staff->degree }}</p>
        <p><strong>Phone:</strong> {{ $staff->phone }}</p>
        <p><strong>Email:</strong> {{ $staff->email }}</p>
        <p><strong>Department:</strong> 
            @if($staff->department)
                <a href="{{ route('departments.show', $staff->department->id) }}">{{ $staff->department->name }}</a>
            @else
                Not Assigned
            @endif
        </p>
    </div>
</div>

@if(auth()->user()->role === 'admin')
    <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-warning">Edit Staff</a>
    <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this staff member?')">Delete Staff</button>
    </form>
@endif

<a href="{{ route('staff.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
