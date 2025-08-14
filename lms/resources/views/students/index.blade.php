@extends('admin')
@section('content')
<h1>Students List</h1>
@foreach($students as $student)
    <div>
        <h2>{{ $student->fname }}</h2><br>
        <p>{{ $student->lname }}</p>
        <p>{{ $student->email }}</p>
        <a href="{{ route('students.edit', $student->id) }}">Edit</a>
        
        <!-- Delete Form -->
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
        </form>
    </div>
@endforeach
@endsection