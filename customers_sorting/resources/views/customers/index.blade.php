@extends('dashboard');

    @section('content')

    <a class="btn btn-primary" href="{{route('customers.create')}}">Create New Customer</a>

     {{ $customers->links() }}


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>@sortablelink('First Name')</th>
                <th>@sortablelink('Last Name')</th>
                <th>@sortablelink('age')</th>
                <th>@sortablelink('address')</th>
                <th>@sortablelink('city')</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

             @if($customers->count())
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
      @endif
    </table>
  {!! $customers->appends(\Request::except('page'))->render() !!}
    {{-- {{ $customers->links() }} --}}
@endsection

