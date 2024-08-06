<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Card extends Component
{
    use LivewireAlert;

    public Product $product;
    public $isFavorited = false;

    public $path = '';
    public $images;
    public $inCart = false;

    // public $color;

    public function mount(Product $product)
    {
        // $pro = Product::find($product->id);
        $this->product = $product;
        $this->images = $product->images;

        if ($product->images()->exists()) {
            $this->path = $product->images->first()->path;
        }
        if (Auth::check()) {
            $this->isFavorited = $this->product->isFavoritedBy(Auth::id());
        }
        $this->checkInCart();
    }
    public function show()
    {
        return redirect()->route('pro.show', ['id' => $this->product->id]);
    }
    public function toggleFavorite(): void
    {
        if (Auth::check()) {
            if ($this->isFavorited) {
                $this->product->favorites()->detach(Auth::id());

                $this->alert('success', 'تم إزالة المنتج من المفضلة.', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                    'text' => '',
                ]);
            } else {
                $this->product->favorites()->attach(Auth::id());
                $this->alert('success', 'تم إضافة المنتج الى المفضلة.', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                    'text' => '',
                ]);
            }

            $this->isFavorited = !$this->isFavorited;
        } else {
            $this->alert('info', 'يجب عليك تسجيل الدخول للحصول على هذه الميزة', [
                'position' => 'center',
                'timer' => 2500,
                'toast' => true,
                'text' => '',
            ]);
        }
    }
    public function toggleImage($text)
    {
        $this->path = $text;
    }

    public function toggleCart()
    {
        $this->dispatch('cart-event');
        $sessionId = session()->getId();
        $userId = Auth::id();

        $cartItem = Cart::where('pro_id', $this->product->id)
            ->where(function ($query) use ($userId, $sessionId) {
                $query->where('user_id', $userId)
                    ->orWhere('session_id', $sessionId);
            })
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            $this->inCart = false;

            $this->alert('success', 'تم إزالة المنتج من السلة.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
            ]);
        } else {
            Cart::create([
                'pro_id' => $this->product->id,
                'user_id' => $userId,
                'session_id' => $sessionId,
                'quantity' => 1,
            ]);

            $this->inCart = true;

            $this->alert('success', 'تم إضافة المنتج إلى السلة.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
            ]);
        }
    }

    public function checkInCart()
    {
        $sessionId = session()->getId();
        $userId = Auth::id();

        $this->inCart = Cart::where('pro_id', $this->product->id)
            ->where(function ($query) use ($userId, $sessionId) {
                $query->where('user_id', $userId)
                    ->orWhere('session_id', $sessionId);
            })
            ->exists();
    }



    public function render()
    {
        return view('livewire.card');
    }
}
