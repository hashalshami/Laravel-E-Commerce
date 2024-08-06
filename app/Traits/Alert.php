<?php

namespace App\Traits;

use Jantinnerezo\LivewireAlert\LivewireAlert;


trait Alert
{
    use LivewireAlert;

    public function fav($check)
    {
        $msg='';
        if($check){
            $msg = 'تم إضافة المنتج الى المفضلة.';
        }else{
            $msg = 'تم إزالة المنتج من المفضلة.';
        }
       return $this->alert('success', $msg, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            // 'width' => '90%',
            'text' => '',
        ]);
    }


    public function addCart()
    {
       
        return $this->alert('success', 'تم إضافة المنتج الى السلة.', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            // 'width' => '90%',
            'text' => '',
        ]);
    }
    public function removeCart()
    {
       
        return $this->alert('success', 'تم إزالة المنتج من السلة.', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            // 'width' => '90%',
            'text' => '',
        ]);
    }
    public function logined(){
        
    }
    public function notAuth()
    {
        
    }
    
}
