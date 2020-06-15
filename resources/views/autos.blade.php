@extends('layouts.main')
@section('content')
<style type="text/css">
#table::-webkit-scrollbar {
    width: 0px;
    background: transparent; /* make scrollbar transparent */
}
</style>
<div class="flex justify-start">
	<h1 class="capitalize text-2xl">{{Request::path()}}</h1>
</div>
	{{ $cars->links() }}
<div class="shadow sm:overflow-x-scroll rounded border-b border-gray-200 my-2" id="table" >
	<table class="min-w-full bg-white">
		<thead class="bg-gray-800 text-white">
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Kenteken</th>
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">@sortablelink('brand', 'Merk')</th>
			<th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">@sortablelink('keyamount' , 'Sleutels')</th>
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">@sortablelink('files_count', 'Bestanden')</th>
			{{-- <th class="w-1/5 text-left py-3 px-4 uppercase font-semibold text-sm">Bekijk</th> --}}
		</thead>
		<tbody class="text-gray-700">
			@foreach($cars as $car)
				<tr class="hover:bg-gray-300 cursor-pointer" onclick="window.location='/auto/{{$car->licenseplate}}';">
					<td class="w-1/3 text-left py-3 px-4">{{$car->licenseplate}}</td>
					<td class="w-1/3 text-left py-3 px-4 truncate">{{$car->brand}} - {{$car->version}}</td>
					<td class="w-1/5 text-left py-3 px-4">{{$car->keyamount}}</td>
					<td class="w-1/3 text-left py-3 px-4">{{$car->files_count}}</td>
					{{-- <td class="w-1/5 text-left py-3 px-4"><a href="/auto/{{$car->licenseplate}}"><i class="fas fa-search"></i></a></td> --}}
				</tr>
			@endforeach
		</tbody>
	</table>
	
</div>
{{ $cars->links() }}

@endsection
