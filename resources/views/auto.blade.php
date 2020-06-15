@extends('layouts.main')
@section('content')
<div class="md:px-32 py-8 w-full">
	<div class="flex justify-end">
		@if($car->sold)
		<a href="/auto/{{$car->licenseplate}}/set/unsold" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Niet meer verkocht</a>
		@else
		<a href="/auto/{{$car->licenseplate}}/set/sold" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Verkocht</a>
		@endif

		
	</div>
	<div>
		<table>
			<thead>
				<th class="px-32"></th>
				<th></th>
			</thead>
			<tbody class="text-left" >
				<tr class="">
					<td class="text-2xl">Merk</td>
					<td>{{$car->brand}}</td>
				</tr>
				<tr>
					<td class="text-2xl">Uitvoering</td>
					<td>{{$car->version}}</td>
				</tr>
				<tr>
					<td class="text-2xl">Kenteken</td>
					<td>{{$car->licenseplate}}</td>
				</tr>
				<tr>
					<td class="text-2xl">Sleutels</td>
					<td>@livewire('keys',  ['car' => $car])</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="md:px-32 py-8 w-full">
		@if($errors->any())
			<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
			  <p class="font-bold">Waarschuwing</p>
			  <p>{{$errors->first()}}</p>
			</div>
		@endif
    <div class="py-4">
	 	<form method="post" enctype='multipart/form-data'>
	 		@csrf
		    <input type='file' name="file" />
			<input type="hidden" id="license" name="license" value="{{$car->licenseplate}}">
			<button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mt-4">Upload</button>
			
	 	</form>
	 	
	</div>

  <h1 class="text-3xl">Files</h1>
  <div class="shadow overflow-hidden rounded border-b border-gray-200">
    <table class="min-w-full bg-white">
	<thead class="bg-gray-800 text-white">
		<tr>
		  <th class="w-4/5 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
		  <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm text-center">View</th>
		  <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm text-center">Delete</th>
		</tr>
	</thead>
    <tbody class="text-gray-700">
      	@foreach($car->files as $file)
      		<tr>
	        	<td class="w-4/5 text-left py-3 px-4">{{$file->name}}</td>
	        	<td class="text-center">
	        		<a href="/storage/{{$file->location}}"  target="_blank"><i class="fas fa-search"></i></a>
	        	</td>
	        	<td class="text-center">
	        		<a href="delete/{{$car->licenseplate}}/file/{{$file->name}}"><i class="fas fa-trash-alt"></i></a>
	        	</td>
    		</tr>
      	@endforeach
    </tbody>
    </table>

  </div>
</div>
@endsection