@extends('admin')
@section('content')
<div class="container">
    <h1>Edit Course</h1>
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $course->name) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $course->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="professor" class="form-label">Assign Professor</label>
            <select name="professor_id" id="professor" class="form-control">
                <option value="">Select a Professor</option>
                @foreach($professors as $professor)
                    <option value="{{ $professor->id }}" {{ isset($course) && $course->professor_id == $professor->id ? 'selected' : '' }}>
                        {{ $professor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection