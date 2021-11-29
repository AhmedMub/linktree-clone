<div class="switch-fix">
    <div class="buttonSW r" id="button-1">
        <input wire:model="status" type="checkbox" name="toggle" id="{{ $name.$link->id }}" class="checkbox">
        <div class="knobs"></div>
        <div class="layer"></div>
        <label for="{{ $name.$link->id }}"></label>
    </div>
</div>
