@extends('layout');


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Customer Information</title>
</head>
<body>

    @section('content')
    <h3>Show Customer Information</h3>

     <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Age</th>
                <th>Address</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->last_name}}</td>
                <td>{{$customer->age}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->city}}</td>
            </tr>
        </tbody>
    </table>

    <p>
        <a href="{{route('customers.index') }}">All Customers</a>
    </p>

    @endsection
</body>
</html>