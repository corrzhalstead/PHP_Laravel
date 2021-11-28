<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortBy = $request->query('sortBy') ?? 'first_name';
        $direction = $request->query('direction') ?? 'asc';
        $customers = Customer::query()->orderBy($sortBy, $direction);
                 
        return view('customers.index', ['customers' => $customers->paginate(10)]);
    }

    //WHEN USING THE PACKAGE SORT
    //   public function index()
    // {
    //     $customers = \App\Models\Customer::sortable()->paginate(20);
        
    //     return view('customers.index', ['customers' =>$customers]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Customer::class)) {
            return redirect()->route('customers.index')->with('error', 'You do not have permission.');
        };

        $customer = new Customer;
        return view('customers.create', ['customer' => $customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \App\Models\Customer::create($this->validatedData($request));

        return redirect()->route('customers.index')->with('success', 'New Customer was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->cannot('show', \App\Models\Customer::class)) {
            return redirect()->route('customers.index')->with('error', 'You do not have permission.');
        };

        $customer = Customer::findOrFail($id);
        return view('customers.show', ['customer' =>$customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = \App\Models\Customer::findOrFail($id);
        return view('customers.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \App\Models\Customer::find($id) ->update($this->validatedData($request));

        return redirect()->route('customers.index')->with('success', 'Customer Info was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = \App\Models\Customer::find($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer Info was deleted');
    }

// Repopulate THE DATA
    public function validatedData($request) {

        return $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'integer',
            'address' => 'required',
            'city' => 'required',
        ]);
    }

//     public function request(Customer $customers)
// {       
//     $customers = $customers::sortable()->paginate(5);
//    return view('customers.index',compact('customers'));
// }
}
