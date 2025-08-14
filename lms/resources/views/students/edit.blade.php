@extends('admin')
@section('content')
<h1>Edit Student</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Use PUT method for updating -->
    <input type="text" name="fname" value="{{ old('fname', $student->fname) }}" placeholder="First Name">
    <input type="text" name="lname" value="{{ old('lname', $student->lname) }}" placeholder="Last Name">
    <input type="email" name="email" value="{{ old('email', $student->email) }}" placeholder="Email">
    <input type="submit" value="Update">
</form>
@endsection