<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class SearchBar extends Component
{
    use WithPagination;

    public $q;
    

    public function render()
    {
        $products =Product::when($this->q ,function($query){
            return $query->where('pro_name','like','%'.$this->q.'%');
        })->paginate();
        return view('livewire.search-bar',[
            'products'=>$products
        ]);
    }
}
