<?php

namespace App\Http\Livewire;
use \App\Models\Customer;



use Livewire\Component;

class Customers extends Component
{
    public $sortBy = 'first_name';
    public $direction = 'asc';

    //BINDING -Will track the URL in the browser
    public $search = "";
    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => ''],
        'direction' => ['except' => ''],
    ];

    //Repopulate
    public function mount() {
        $this->search = request()->query('search', $this->search);
        $this->sortBy = request()->query('sortBy', $this->sortBy);
        $this->direction = request()->query('direction', $this->direction);
    }

    //SORTING
    public function doSort($field, $direction) {
        $this->sortBy = $field;
        $this->direction = $direction;
    }

    public function render()
    {
        //How to search by first/last name in search bar
        $customers = \App\Models\Customer::where('first_name', 'LIKE', "%$this->search%")
                                            ->orWhere('last_name', 'LIKE', "%$this->search%" )
                                            ->orderBy($this->sortBy, $this->direction);

        return view('livewire.customers', ['customers' => $customers->get()]);
    }
}
