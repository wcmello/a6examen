<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Keys extends Component
{
	public $count;
	public $car;

	public function mount($car)
	{
		//set count value to current amount stored in db
		$this->count = $car->keyamount;

		//set car given with livewire component
		$this->car = $car;
	}
    public function increment()
    {
    	//increment count by 1
        $this->count++;

        //set model to count amount
        $this->car->keyamount = $this->count;

        //save model
        $this->car->save();
    }

    public function decrement()
    {

    	//decrement count by 1
        $this->count--;

        //if count is lower than one / count = 0
        //omdat er niet minder dan 0 sleutels kunnen zijn
        if ($this->count < 0) {
        	$this->count = 0;
        }

        //set model to count amount
        $this->car->keyamount = $this->count;

        //save model
        $this->car->save();

    }
    public function render()
    {
        return view('livewire.keys');
    }

}
