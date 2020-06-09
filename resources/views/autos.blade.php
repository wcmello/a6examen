@extends('layouts.main')
@section('content')
	{{ $cars->links() }}
<div class="shadow overflow-hidden rounded border-b border-gray-200">

	<table class="min-w-full bg-white">
		<thead class="bg-gray-800 text-white">
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Kenteken</th>
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">@sortablelink('brand', 'Merk')</th>
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">@sortablelink('keyamount' , 'Sleutels')</th>
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">@sortablelink('files_count', 'Bestanden')</th>
			<th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Bekijk</th>
		</thead>
		<tbody class="text-gray-700">
			@foreach($cars as $car)
				<tr class="hover:bg-gray-300">
					<td class="w-1/3 text-left py-3 px-4">{{$car->licenseplate}}</td>
					<td class="w-1/3 text-left py-3 px-4 truncate">{{$car->brand}} - {{$car->version}}</td>
					<td class="w-1/3 text-left py-3 px-4">{{$car->keyamount}}</td>
					<td class="w-1/3 text-left py-3 px-4">{{$car->files_count}}</td>
					<td class="w-1/3 text-left py-3 px-4"><a href="/auto/{{$car->licenseplate}}"><i class="fas fa-search"></i></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
</div>
{{ $cars->links() }}

@endsection
