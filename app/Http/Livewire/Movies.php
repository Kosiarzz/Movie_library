<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class Movies extends Component
{
    public $search = '';
 
    public function render()
    {
        if(strlen($this->search) > 1)
        {
            return view('livewire.movies', [
                'movies' => Movie::where('title', 'LIKE', '%'.$this->search.'%')->get('title'),
            ]);
        }

        return view('livewire.movies');
    }
}
