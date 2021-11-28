<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Playground extends Component
{
  
    public $count = 0;

    public function increment() {
        $this->count++;
    }

    public function decrement() {
        $this->count--;
    }

    public $message = "hello";

    protected $queryString = ['message' => ['except' => '']];

    public function mount() {
        $this->message=request()->query('message', $this->message);
    }

    public function render()
    {
        return view('livewire.playground');
    }
}
