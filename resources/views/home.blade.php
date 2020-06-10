@extends('layouts.main')

@section('content')
<div class="flex justify-between flex-wrap">
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-green-600"><i class="fa fa-car fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Aantal autos in het systeem</h5>
                    <h3 class="font-bold text-3xl">{{$carcount}}</h3>
                </div>
            </div>
        </div>

    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-orange-600"><i class="fa fa-file fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Aantal bestanden in het systeem</h5>
                    <h3 class="font-bold text-3xl">{{$filecount}}</h3>
                </div>
            </div>
        </div>
        
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-green-600"><i class="fa fa-key fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Aantal sleutels in het systeem</h5>
                    <h3 class="font-bold text-3xl">{{$keycount}}</h3>
                </div>
            </div>
        </div>
        
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 p-3">
        <div class="bg-white border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-shrink pr-4">
                    <div class="rounded p-3 bg-green-600"><i class="fa fa-key fa-2x fa-fw fa-inverse"></i></div>
                </div>
                <div class="flex-1 text-right md:text-center">
                    <h5 class="font-bold uppercase text-gray-500">Verkochte autos in het systeem</h5>
                    <h3 class="font-bold text-3xl">{{$soldcount}}</h3>
                </div>
            </div>
        </div>   
    </div> 
</div>
 

@endsection
