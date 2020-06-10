<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{

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

    public function destroy($kenteken, $filename)
    {
        //zoek file en store het in een variable
        $file = File::where('carKenteken', $kenteken)->where('name', $filename)->first();

        //delete file
        $file->delete();

        return redirect()->back();
    }
}
