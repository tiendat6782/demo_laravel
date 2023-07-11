<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
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
                {{-- <th>Address</th>
                <th>Date</th> --}}
            </tr>
        </thead>
        @foreach($students as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td>{{ $st->email }}</td>
                {{-- <td>{{ $st->address }}</td>
                <td>{{ $st->date_of_birth }}</td> --}}

                
            </tr>
            
        @endforeach
    </table>
</body>
</html>