@extends('layouts.app')

@section('title', 'Departments')

@section('content')
<h1>Departments</h1>

@if(auth()->user()->role === 'admin')
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Add New Department</a>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Code</th>
            <th>Phone</th>
            <th>Email</th>
            @if(auth()->user()->role === 'admin')
                <th>Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td><a href="{{ route('departments.show', $department) }}">{{ $department->name }}</a></td>
                <td>{{ $department->code }}</td>
                <td>{{ $department->phone }}</td>
                <td>{{ $department->email }}</td>
                @if(auth()->user()->role === 'admin')
                    <td>
                        <a href="{{ route('departments.edit', $department) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('departments.destroy', $department) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
