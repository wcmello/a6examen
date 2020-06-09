<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Keys extends Component
{
	public $count;
	public $car;

	public function mount($car)
	{
		$this->count = $car->keyamount;
		$this->car = $car;
	}
    public function increment()
    {
        $this->count++;
        $this->car->keyamount = $this->count;
        $this->car->save();
    }

    public function decrement()
    {
        $this->count--;
        $this->car->keyamount = $this->count;
        $this->car->save();
    }
    public function render()
    {
        return view('livewire.keys');
    }

}
