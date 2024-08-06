<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Product; 

class FavBtn extends Component
{
    // use LivewireAlert;

    public $product;
    public $isFavorited = false;


    public function mount($fav)
    {
        $this->product = Product::find($fav);
        if (Auth::check()) {
            $this->isFavorited = $this->product->isFavoritedBy(Auth::id());
        }
    }
    public function toggleFavorite(): void
    {
        if (Auth::check()) {
            if ($this->isFavorited) {
                $this->product->favorites()->detach(Auth::id());
                $this->dispatch('fav-removed');

            } else {
                $this->product->favorites()->attach(Auth::id());
                $this->dispatch('fav-added');
            }

            $this->isFavorited = !$this->isFavorited;
           
        } else {
            $this->dispatch('not-auth');
        }
    }
    public function render()
    {
        return view('livewire.product.fav-btn', ['isFavorited' => $this->isFavorited]);
    }
}
