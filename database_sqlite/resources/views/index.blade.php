<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers Information</title>
</head>
<body>
    <h1>Customers Information:</h1>

    <table>
        <tr>
            <th>No. </th>
            <th>First </th>
            <th>Last </th>
            <th>Age</th>
            <th>Address</th>
            <th>City</th>
        </tr>
      @foreach($customers as $customer)
        <tr>
            <td>{{$customer["id"]}}</td>
            <td>{{$customer["first_name"]}}</td>
            <td>{{$customer["last_name"]}}</td>
            <td>{{$customer["age"]}}</td>
            <td>{{$customer["address"]}}</td>
            <td>{{$customer["city"]}}</td>
        </tr>
      @endforeach
    </table>


</body>
</html>