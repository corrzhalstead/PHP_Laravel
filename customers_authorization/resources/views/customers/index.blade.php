@extends('dashboard');

@section('content')


@can('create', App\Models\Customer::class)

    <a class="btn btn-primary" href="{{route('customers.create')}}">Create New Customer</a>
@endcan    

     {{ $customers->links() }}
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>
                 <a href="{{route('customers.index', ['sortBy' => 'first_name', 'direction' => 'asc' ])}}">First Name</a>
                 </th>
                 <th>
                 <a href="{{route('customers.index', ['sortBy' => 'last_name', 'direction' => 'asc' ])}}">Last Name</a>
                 </th>
                 <th>
                 <a href="{{route('customers.index', ['sortBy' => 'age', 'direction' => 'asc' ])}}">Age</a>
                 </th>
                <th>Address</th>
                <th>City</th>
                <th></th>
                @can('viewAny', App\Models\Friend::class)
                    <th></th>
                    <th></th>
                @endcan
            </tr>
        </thead>

         {{-- <thead>
            <tr>
                <th>@sortablelink('first_name', 'First Name', 'asc')</th>
                <th>@sortablelink('last_name', 'Last Name')</th>
                <th>@sortablelink('age', 'Age')</th>
                <th>@sortablelink('address')</th>
                <th>@sortablelink('city')</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead> --}}
        
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

                @can('viewAny', App\Models\Customer::class)
                    <td><a href="{{ route('customers.edit', $customer->id) }}">Edit</a></td>
                    <td>
                        <form action="{{route('customers.destroy', $customer->id)}}" method="POST"
                            onSubmit="return confirm('Are you sure you want to delete?');">
                            @csrf
                            @method('DELETE')
                        <button class="btn btn-error" type="submit">Delete</button>    
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
      </tbody>
      @endif
    </table>
  {{-- {!! $customers->appends(\Request::except('page'))->render() !!} --}}
    {{ $customers->links() }}
@endsection

