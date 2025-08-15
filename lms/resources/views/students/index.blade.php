@extends('admin')
@section('content')
<div class="container">
    <h1>Students List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Courses</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->fname }} {{ $student->lname }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        @if($student->courses->isNotEmpty())
                            <ul>
                                @foreach($student->courses as $course)
                                    <li>{{ $course->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            No courses assigned
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
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