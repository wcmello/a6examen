<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	//geef aan welke columns fillable zijn wanneer je een nieuwe App\File aanmaakt
	protected $fillable = [
        'name', 'location', 'carKenteken'
    ];
    
    //hier geef je de relatie aan die App\File heeft met App\Car
    //(Pad naar model, externe key, local foreign key)
    //Dit ^ moet gebeuren omdat onze columns niet de normale relatie conventie die laravel kent
    public function car(){
    	$this->hasOne('App\File', 'carLicenseplate', 'licenseplate');
    }
}
