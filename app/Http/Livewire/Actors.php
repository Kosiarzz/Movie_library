<?php

namespace App\Http\Livewire;

use App\Models\Person;
use Livewire\Component;

class Actors extends Component
{
    public $search = '';
 
    public function render()
    {
        if(strlen($this->search) > 1)
        {
            return view('livewire.actors', [
                'actors' => Person::where('person', 'LIKE', '%'.$this->search.'%')->get(),
            ]);
        }

        return view('livewire.actors');
    }
}
