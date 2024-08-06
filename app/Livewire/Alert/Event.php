<?php

namespace App\Livewire\Alert;

use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Event extends Component
{
    use LivewireAlert;

    public function mount($login =false){
        if($login)
        {
            $this->alert('success', 'تم تسجيل الدخول بنجاح.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => false,
                // 'width' => '90%',
                'text' => '',
            ]);
        }
    }
   

    

    #[On('not-auth')]
    public function notAuth()
    {
        $this->alert('info', 'يجب عليك تسجيل الدخول للحصول على هذه الميزة', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
        ]);
    }

    public function render()
    {
        return view('livewire.alert.event');
    }
}
