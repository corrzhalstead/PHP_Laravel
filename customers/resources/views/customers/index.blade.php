@extends('layout');

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Information</title>
</head>
<body>
    @section('content')
    <h3>Customer Information:</h3>

    <table class="table table-striped table-hover">
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
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->last_name}}</td>
                <td>{{$customer->age}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->city}}</td>
                <td><a href="{{ route('customers.show', $customer->id) }}">Show Customer Details</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
@endsection

</body>
</html>