<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CartBtn extends Component
{

    public $pro;
    public $inCart = false;
    public $countInCart;

    public function mount($pro)
    {
        $this->pro = $pro;
        $this->checkInCart();
    }
    public function removeFromCart()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id())->first();
            $cart = $user->cart->first();

            $cartItem = $cart->cartItems->where('pro_id', $this->pro)->first();
            $cartItem->delete();

            $this->inCart = false;
            $this->dispatch('cart-event');
            $this->dispatch('cart-removed');
        } else {
            $this->dispatch('not-auth');
        }
    }

    public function addToCart()
    {

        if (Auth::check()) {
            $user = User::find(Auth::id())->first();
            $cart = $user->cart()->firstOrCreate();
            $cartItem = $cart->cartItems->where('pro_id', $this->pro)->first();
            if (!$cartItem) {

                $cart->cartItems()->create(['pro_id' => $this->pro, 'quantity' => 1]);
            }
            $this->inCart = true;
            $this->countInCart = 1;
            $this->dispatch('cart-event');
            $this->dispatch('cart-added');
        } else {
            $this->dispatch('not-auth');
        }
    }


    public function toggleCart()
    {

        $user = User::find(Auth::id())->first();

        if (!$user->hasCart()) {
            $cart = $user->cart->create();
        } else {
            $cart = $user->cart;
        }

        if ($this->inCart) {
            $cart->products()->detach($this->pro);
            $this->inCart = false;
        } else {
            $cart->products()->attach($this->pro, ['quantity' => 1]);
            $this->inCart = true;
        }
        $this->dispatch('cart-event');
    }

    public function checkInCart()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if ($user->hasCart()) {
                $cartItem = $user->cart->cartItems->where('pro_id', $this->pro)->first();
                if ($cartItem) {
                    $this->inCart = true;
                    $this->countInCart = $cartItem->quantity;
                }
            }
        }
    }

    public function incrementCart()
    {
        if (Auth::check()) {
            $pro_id = $this->pro;
            $user = User::find(Auth::id());
            $cart = $user->cart()->firstOrCreate();

            $cartItem = $cart->cartItems->where('pro_id', $this->pro)->first();
            if ($cartItem) {
                $cartItem->update([
                    'quantity' => $cartItem->quantity + 1,
                ]);
                $this->countInCart = $cartItem->quantity;
            } else {
                $cart->cartItems()->create([
                    'pro_id' => $pro_id,
                    'quantity' => 1
                ]);
                $this->countInCart = 1;
            }
            $this->addCart();
        } else {
            $this->notAuth();
        }
    }

    public function render()
    {
        return view('livewire.product.cart-btn', ['countInCart' => $this->countInCart]);
    }
}
