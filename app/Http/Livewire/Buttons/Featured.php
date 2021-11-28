<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Link;
use Livewire\Component;

class Featured extends Component
{

    public Link $link;

    public string $name;

    public bool $status;

    public function mount()
    {

        $this->status = $this->link->getAttribute('status');
    }

    public function render()
    {
        return view('livewire.buttons.status');
    }

    public function updating($name, $value)
    {

        $this->link->setAttribute($name, $value)->save();
    }
}
