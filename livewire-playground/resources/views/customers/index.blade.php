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

    <a class="btn btn-primary" href="{{route('customers.create')}}">Create New Customer</a>

     {{ $customers->links() }}
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name </th>
                <th>Age</th>
                <th>Address</th>
                <th>City</th>
                <th></th>
                <th></th>
                <th></th>
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
                 <td><a href="{{ route('customers.edit', $customer->id) }}">Edit</a></td>
                <td>
                    <form action="{{route('customers.destroy', $customer->id)}}" method="POST"
                        onSubmit="return confirm('Are you sure you want to delete?');">
                        @csrf
                        @method('DELETE')
                       <button class="btn btn-error" type="submit">Delete</button>    
                    </form>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>

    {{ $customers->links() }}
@endsection

</body>
</html>