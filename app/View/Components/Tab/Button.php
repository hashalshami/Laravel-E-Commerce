<?php

namespace App\View\Components\Tab;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $open,
    ) {
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.tab.button');
    }
}
