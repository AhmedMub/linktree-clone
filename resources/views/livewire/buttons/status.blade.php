{{-- <div class="switch">
    <input wire:model='featured' type="checkbox" name="status" id=" {{$name.$link->id}} ">

    <label  for="{{$name.$link->id}}"></label>
    <span class="slider round"></span>
</div>
 --}}

 <div class="m-2 toggle colour">
    <input wire:model="featured" type="checkbox" name="toggle" id="{{ $name.$link->id }}" class="hidden toggle-checkbox">
    <label for="{{ $name.$link->id }}" class="block w-12 h-6 duration-150 ease-out rounded-full cursor-pointer transition-color toggle-label"></label>
</div>

