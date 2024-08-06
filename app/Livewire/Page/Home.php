<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\Product;

class Home extends Component
{
    public $products;
    public function mount()
    {
        $this->products = Product::get();
    }
    public function render()
    {
        // return view('livewire.page.home');
        return view('home');
    }
}
