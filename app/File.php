<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	protected $fillable = [
        'name', 'location', 'carKenteken'
    ];
    public function car(){
    	$this->hasOne('App\File', 'carLicenseplate', 'licenseplate');
    }
}
