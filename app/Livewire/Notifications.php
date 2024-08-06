<?php

namespace App\Livewire;

use Livewire\Component;

class Notifications extends Component
{
     protected $listeners = ['notify'];

   
    public function notify($type, $title, $message)
    {
        $this->dispatchBrowserEvent('notify', [
            'type' => $type,
            'title' => $title,
            'message' => $message,
        ]);
    }
    public function render()
    {
        return view('livewire.notifications');
    }
}
