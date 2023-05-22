<?php

namespace App\Traits;

use function PHPUnit\Framework\isEmpty;

trait SessionMessages{
    public function messages($data){

        if(!isEmpty($data)){
            return session()->flash('success',__('messages.success'));
        }else{
            return session()->flash('failed',__('messages.faild'));
        }

    }
}
