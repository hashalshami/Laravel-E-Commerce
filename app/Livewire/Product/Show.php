<?php

namespace App\Livewire\Product;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Product;

class Show extends Component
{
    public Product $product;
    public $images;
    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->images = $this->product->images;
    }
    // #[Title('Create Post')] 
    public function render()
    {
        return view('livewire.product.show');
    }
}
