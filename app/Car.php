<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\File;
class Car extends Model
{
	protected $fillable = [
        'brand', 'model', 'version', 'licenseplate', 'sold',
    ];

    public function files(){
    	$this->hasMany('App\File', 'licenseplate', 'carLicenseplate');
    }
}
