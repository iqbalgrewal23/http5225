@extends('admin')
@section('content')
<div class="container">
    <h1>Courses List</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Description</th>
                <th>Professor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>
                        @if($course->professor)
                            {{ $course->professor->name }}
                        @else
                            No professor assigned
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection