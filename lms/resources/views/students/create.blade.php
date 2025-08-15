@extends('admin')
@section('content')
<div class="container">
    <h1>Add New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter first name">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter last name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="mb-3">
            <label for="courses" class="form-label">Select Courses</label>
            <select name="courses[]" id="courses" class="form-control" multiple>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection