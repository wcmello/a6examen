<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\File;
class Car extends Model
{
	//include voor package die sortable columns mogelijk maakt
    use Sortable;

    //geef aan welke columns fillable zijn wanneer je een nieuwe App\Car aanmaakt
	protected $fillable = [
        'brand', 'model', 'version', 'licenseplate', 'sold',
    ];

    //geef aan welke columns je sortable wilt maken
    public $sortable = [
    	'brand', 'model', 'version', 'licenseplate', 'availableKeys'
    ];

    //bypass voor sortable columns voor een SQL SUM query
    public $sortableAs = ['files_count'];

    //hier geef je de relatie aan die App\Car heeft met App\Files
    //(Pad naar model, externe key, local foreign key)
    //Dit ^ moet gebeuren omdat onze columns niet de normale relatie conventie die laravel kent
    public function files(){
    	return $this->hasMany('App\File', 'carKenteken', 'licenseplate');
    }
}
