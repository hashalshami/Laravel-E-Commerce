<?php

namespace App\Livewire\Product;

// use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Product;

class Overview extends Component
{
    public Product $product;
    public $images;
    public function mount($id)
    {
        $this->product =Product::find($id);
        $this->images =$this->product->images;
    }
    public function render()
    {
        return view('livewire.product.overview');
    }
}
