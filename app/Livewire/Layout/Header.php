<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class Header extends Component
{
    public $count = 0;
    public $cart;

    public function mount()
    {
        $this->carts();
    }

    #[On('cart-event')]
    public function carts(){
        $sessionId = session()->getId();
        $userId = Auth::id();

        $this->count = Cart::where(function ($query) use ($userId, $sessionId) {
            $query->where('user_id', $userId)
                ->orWhere('session_id', $sessionId);
        })->count();
    }

    public function render()
    {
        return view('livewire.layout.header');
    }
}
