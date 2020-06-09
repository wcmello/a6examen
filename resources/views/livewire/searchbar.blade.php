<div class="relative pull-right pl-4 pr-4 md:pr-0">
    <input type="search" wire:model="searchtext" placeholder="Auto zoeken op kenteken" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
    <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
        <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
        </svg>
    </div>
        <h4>{{$error}}</h4>
    @if($found)
    <div class="absolute w-full p-2 shadow-xl">
    	<ul class="bg-gray-100 p-2">

    		@foreach($cars as $car)
    			<a href="/auto/{{$car->licenseplate}}"><li class="border-b-2 border-gray-300 hover:bg-gray-300">{{$car->brand}} - {{$car->model}} - {{$car->licenseplate}}</li></a>
    		@endforeach
    	</ul>
    </div>
    @endif
</div>