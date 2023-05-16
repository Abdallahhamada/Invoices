<?php

namespace App\Traits;

trait SessionMessages{
    public function messages($data){

        if($data){
            return session()->flash('success',__('messages.success'));
        }else{
            return session()->flash('failed',__('messages.faild'));
        }

    }
}
