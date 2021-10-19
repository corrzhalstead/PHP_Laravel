@extends('layout')

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

    {{-- Show error message --}}

    @if ($errors->any())
    <div class="toast toast-error">
        @foreach ($errors->all() as $error)
        <span>{{$error}}</span><br />
        @endforeach
    </div>
    @endif

    <div class="column col-3">
        <h3>New Customer Info:</h3>

        <form method="POST" action="{{route('customers.store')}}">
            @csrf
            <div class="form-group">
                @include('customers.form')
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">New Customer</button>
                <a href="{{route('customers.index')}}">Cancel</a>
            </div>
            
        </form>
    </div>
   
@endsection

</body>
</html>