@section('title')
Livewire Playground

@endsection

<div>
  <div class="text-center">
    <button wire:click="increment"> + </button>
    {{$count}}
    <button wire:click="decrement"> - </button>
  </div>

  <div class="text-center">
      {{$message}}
      <br />
      <input wire:model="message" type="text">
  </div>
</div>
