<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\File;
class Car extends Model
{
	use Sortable;

	protected $fillable = [
        'brand', 'model', 'version', 'licenseplate', 'sold',
    ];

    public $sortable = [
    	'brand', 'model', 'version', 'licenseplate', 'availableKeys'
    ];

    public $sortableAs = ['files_count'];


    public function files(){
    	return $this->hasMany('App\File', 'carKenteken', 'licenseplate');
    }
}
