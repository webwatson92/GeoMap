<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Conter extends Component
{
	public $count = 10;

	public function increment(){
		$this->count++;
    }

    public function decrement(){
		$this->count--;
    }

    public function render()
    {
        return view('livewire.conter');
    }
}
