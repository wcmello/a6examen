<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Car;
class ApiController extends Controller
{
    public function refresh(){
		$response = Http::withToken($this->authenticate())->get('https://advertisementapi.autotelexpro.nl/Vehicle/All');

		$vooraad = [];
	    foreach ($response->json() as $stock) {
	    	foreach ($stock['stockStatus'] as $stockarray) {
	    		if ($stockarray == 2) {
	    			$car = Http::withToken($this->authenticate())->get('https://advertisementapi.autotelexpro.nl/Vehicle/ByStockNumber/' . $stock['stockNumber']);
					$car = $car->json();

					if (!Car::where('licenseplate', $car[0]['licensePlate'] ?? 'N/A')->first()) {
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
    	$auth = Http::withHeaders([
				'Content-type' => 'application/x-www-form-urlencoded'
			])->asForm()->post('https://advertisementapi.autotelexpro.nl/oauth/token', [
						'grant_type' => 'client_credentials',
						'client_id'	=> '94456b80-87b3-4f54-8351-d9fe72f9230d',
						'client_secret' => '1bb7e4e8-dcf8-48d4-89f7-024f8e078958'

			]);
			$auth = $auth->json();

			return $auth['access_token'];
    }
}
