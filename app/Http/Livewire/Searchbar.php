<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Car;

class Searchbar extends Component
{
	public $searchtext;
	public $error = '';
	public $found = false;
	public $cars = [];
    public function render()
    {
        return view('livewire.searchbar');
    }
    public function updated()
    {
    	
		$this->searchtext = preg_replace('/\s+/', '', $this->searchtext);
		$this->cars = Car::where('licenseplate', 'like', '%'.$this->searchtext.'%')->orwhere('brand', 'like', '%'.$this->searchtext.'%')->orwhere('version', 'like', '%'.$this->searchtext.'%')->limit(10)->get();
		if (!$this->cars->isEmpty()) {
			$this->found = true;
		}
		else{
			$this->found = false;
		}
		if($this->searchtext == ""){
    		$this->cars = [];
    	}
    }
}
