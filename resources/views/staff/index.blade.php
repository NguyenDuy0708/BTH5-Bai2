@extends('layouts.app')

@section('title', 'Staff Members')

@section('content')
<h1>Staff Members</h1>

@if(auth()->user()->role === 'admin')
    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Add New Staff Member</a>
@endif

@if($staffs->isEmpty())
    <p>No staff members found.</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Title</th>
                <th>Academic Rank</th>
                <th>Department</th>
                <th>Email</th>
                @if(auth()->user()->role === 'admin')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
                <tr>
                    <td>{{ $staff->id }}</td>
                    <td><a href="{{ route('staff.show', $staff->id) }}">{{ $staff->name }}</a></td>
                    <td>{{ $staff->title }}</td>
                    <td>{{ $staff->academic_rank }}</td>
                    <td>
                        @if($staff->department)
                            <a href="{{ route('departments.show', $staff->department->id) }}">{{ $staff->department->name }}</a>
                        @else
                            Not Assigned
                        @endif
                    </td>
                    <td>{{ $staff->email }}</td>
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('staff.edit', $staff->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('staff.destroy', $staff->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
@endsection
