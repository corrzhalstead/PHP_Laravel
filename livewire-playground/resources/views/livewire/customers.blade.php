@section('title')
Customers
@endsection


    

<div>

   <input wire:model="search" type="text" placeholder="Search Customers" size="50" />
   <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>
                    <a href="#" wire:click="doSort('first_name', 'asc')">&uarr;</a>
                    First Name
                    <a href="#" wire:click="doSort('first_name', 'desc')">&darr;</a>
                </th>
                <th>
                    <a href="#" wire:click="doSort('last_name', 'asc')">&uarr;</a>
                    Last Name 
                    <a href="#" wire:click="doSort('last_name', 'desc')">&darr;</a>
                </th>
                <th>
                    <a href="#" wire:click="doSort('age', 'asc')">&uarr;</a>
                    Age
                    <a href="#" wire:click="doSort('age', 'desc')">&darr;</a>
                </th>
                <th>
                    <a href="#" wire:click="doSort('address', 'asc')">&uarr;</a>
                    Address
                    <a href="#" wire:click="doSort('address', 'desc')">&darr;</a>
                </th>
                <th>
                    <a href="#" wire:click="doSort('city', 'asc')">&uarr;</a>
                    City
                    <a href="#" wire:click="doSort('city', 'desc')">&darr;</a>
                </th>
                
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
              
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
