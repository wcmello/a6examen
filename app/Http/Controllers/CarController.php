<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            //haal alle autos op, maak ze sortable en filterable met 15 per pagina
            'cars' => Car::where('sold', 0)->withCount('files')->sortable()->paginate(15)->onEachSide(1)
        ];
        return view('autos', $data);
    }
    /**
     * Display a listing of the resource where sold = 1.
     *
     * @return \Illuminate\Http\Response
     */
    public function sold()
    {
        $data = [
            //haal alle autos op, maak ze sortable en filterable met 15 per pagina
            'cars' => Car::where('sold', 1)->withCount('files')->sortable()->paginate(15)->onEachSide(1)
        ];
        return view('autos', $data);
    }


    public function setSold($kenteken)
    {
        //load car where license is selected
        $car = Car::where('licenseplate', $kenteken)->first();

        //change car sold to 1
        $car->sold = 1;


        //save car
        $car->save();

        return redirect('verkocht');
    }
    public function undoSold($kenteken)
    {
        //load car where license is selected
        $car = Car::where('licenseplate', $kenteken)->first();

        //change car sold to 0
        $car->sold = 0;

        //save car
        $car->save();

        return redirect('verkocht');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($kenteken)
    {
        $data = [
            //haal een auto op uit de database waar het kenteken overeenkomt met het kenteken in de route
            'car' => Car::where('licenseplate', $kenteken)->with('files')->first()
        ];
        return view('auto', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
