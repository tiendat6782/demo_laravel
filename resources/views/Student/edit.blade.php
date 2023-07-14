@extends('templates.layout')
@section('content')
<form action="{{ route('route_student_edit',['id'=>$student->id]) }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" value="{{ $student->name }}" name="name" placeholder="Enter name">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" value="{{ $student->email }}" name="email" placeholder="Enter email">
    </div>
    
    {{-- <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <textarea class="form-control" name="address" rows="3" placeholder="Enter address"></textarea>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date òf birth</label>
        <input type="text" class="form-control" name="date" placeholder="Enter date">
      </div> --}}
    <button type="submit" class="btn btn-primary">Add Student</button>
  </form>




@endsection