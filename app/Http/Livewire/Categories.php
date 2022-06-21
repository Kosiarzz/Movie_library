<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $search = '';
 
    public function render()
    {
        if(strlen($this->search) > 1)
        {
            return view('livewire.categories', [
                'categories' => Category::where('name', 'LIKE', '%'.$this->search.'%')->get(),
            ]);
        }

        return view('livewire.categories');
    }
}
