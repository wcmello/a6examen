<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //valideer of de file een pdf is
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:pdf',
        ]);
        //als de validator faalt, stuur dan terug met een error
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['Alleen PDF\'s uploaden AUB']); 
        }

        //de path naar het opgeslagen bestand
        $path = $request->file('file')->storeAs('public/files/'.$request->license, $request->file('file')->getClientOriginalName());

        //
        $file = $request->file('file');

        //haal duplicate entry van folder uit $path
        $path = str_replace("public/", "", $path);

        //creer een nieuwe file met de informatie
        File::create([
            'name' => $request->file('file')->getClientOriginalName(),
            'carKenteken' => $request->license,
            'location' => $path,
        ]);


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($kenteken, $filename)
    {
        $file = File::where('carKenteken', $kenteken)->where('name', $filename)->first();
        $file->delete();

        return redirect()->back();
    }
}
