<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;


class Status extends Component
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
        return view('livewire.status');
    }

    public function updating($name, $value)
    {

        $this->link->setAttribute($name, $value)->save();
    }
}
