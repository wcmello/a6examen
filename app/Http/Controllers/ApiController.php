<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Car;
class ApiController extends Controller
{
	//de main functie die word aangeroepen met een refresh
    public function refresh(){
    	$token = $this->authenticate();
    	//haalt alle autos op in een lijst
		$response = Http::withOptions(['verify' => false])->withToken($token)->get('https://advertisementapi.autotelexpro.nl/Vehicle/All');

		//loop door elke auto in de lijst
	    foreach ($response->json() as $stock) {
	    	//loop door alle stockstatusen die deze auto heeft
	    	foreach ($stock['stockStatus'] as $stockarray) {
	    		//als deze auto een stockstatus van 2 heeft is hij op voorraad, daar checken we hier voor
	    		if ($stockarray == 2) {
	    			//haal hier de informatie van de auto op, op basis van stockNumber
	    			$car = Http::withOptions(['verify' => false])->withToken($token)->get('https://advertisementapi.autotelexpro.nl/Vehicle/ByStockNumber/' . $stock['stockNumber']);
	    			//zet deze informatie om naar bruikbare json
					$car = $car->json();

					//check of de auto nog niet in de database staat
					if (!Car::where('licenseplate', $car[0]['licensePlate'] ?? 'N/A')->first()) {
						//maak een nieuwe instantie van Car aan en voeg de data toe die in de json staat
						Car::create([
							'brand' => $car[0]['make'] ?? 'N/A',
							'model' => $car[0]['model'] ?? 'N/A',
							'version' => $car[0]['version'] ?? 'N/A',
							'licenseplate' => $car[0]['licensePlate'] ?? 'N/A',
							'sold' => 0,
							'keyamount' => 0,
						]);
					}
	    		}
	    		/*elseif ($stockarray == 3) {
	    			if (!Car::where('licenseplate', $car[0]['licensePlate'] ?? 'N/A')->first()) {
						Car::create([
							'brand' => $car[0]['make'] ?? 'N/A',
							'model' => $car[0]['model'] ?? 'N/A',
							'version' => $car[0]['version'] ?? 'N/A',
							'licenseplate' => $car[0]['licensePlate'] ?? 'N/A',
							'sold' => 1,
						]);
						$count++;
					}
					else{
						$car = Car::where('licenseplate', $car[0]['licensePlate'] ?? 'N/A')->first();

						$car->sold = 1;
						$car->save();
					}
	    		}*/
	    	}
	    }
	    return redirect('home');
    }
    public function authenticate(){
    	//haalt een nieuwe 0Auth2 key op
    	$auth = Http::withOptions(['verify' => false])->withHeaders([
				'Content-type' => 'application/x-www-form-urlencoded'
			])->asForm()->post('https://advertisementapi.autotelexpro.nl/oauth/token', [
						'grant_type' => 'client_credentials',
						'client_id'	=> '94456b80-87b3-4f54-8351-d9fe72f9230d',
						'client_secret' => '1bb7e4e8-dcf8-48d4-89f7-024f8e078958'

			]);
			//zet response om naar json
			$auth = $auth->json();

			//return de auth key
			return $auth['access_token'];
    }
}
