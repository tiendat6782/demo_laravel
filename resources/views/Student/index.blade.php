@extends('templates.layout')
@section('content')

    <button><a href="{{ url('/student/add') }}">add student</a></button>
    <h1>{{ $title }}</h1>
    <h1> {{ $name }} </h1>

    <form action="{{ url('/student') }}" method="post">
        @csrf
        <label for="">Email
        <input type="text" name="search">
    </label>
        <input type="submit" name="btnSearch" value="Tim kiem">
    </form>
    
    <table class="table" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Img</th>
                {{-- <th>Address</th>
                <th>Date</th> --}}
            </tr>
        </thead>
        @foreach($students as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td>{{ $st->email }}</td>
                <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
                {{-- <td>{{ $st->address }}</td>
                <td>{{ $st->date_of_birth }}</td> --}}

                
            </tr>
            
        @endforeach
    </table>
@endsection